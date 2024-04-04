<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Casts\Utils\JsonCast;
use App\Models\Comment;
use App\Traits\HasImages;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, HasImages;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [  ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
     ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'flag'              => JsonCast::class,
     ];

    #---Relations---#

    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }

    public function activePlan()
    {
        return $this->plans()
            ->whereDate('expired_at', '>=', now()->format('Y-m-d'))
            ->orWhere(function (Builder $b) {
                $b->where('expired_at', null);
                $b->where('price', '<', 1);
            })
            ->where('active', true)
            ->limit(1);
    }

    public function activePlanName()
    {
        return $this->activePlan()->first()->name->{app()->getLocale()};
    }

    public function billingAddress()
    {
        return $this->hasMany(Address::class)->where('type', 'billing')->first();
    }
    public function shippingAddress()
    {
        return $this->hasMany(Address::class)->where('type', 'shipping')->first();
    }
    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
    public function getRole()
    {
        return $this->roles->first();
    }
    /**
     * @return HasMany
     */
    public function packages(): HasMany
    {
        return $this->hasMany(Package::class, 'owner_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function productUsers(): HasMany
    {
        return $this->hasMany(ProductUser::class, 'owner_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'owner_id', 'id');
    }
    /**
     * @return BelongsToMany
     */
    public function myProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_users');
    }
    /**
     * @return HasMany
     */
    public function changes(): HasMany
    {
        return $this->hasMany(Change::class, 'owner_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class, 'owner_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class, 'owner_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'owner_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function supports(): HasMany
    {
        return $this->hasMany(Support::class, 'owner_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'owner_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function releases(): HasMany
    {
        return $this->hasMany(Release::class, 'owner_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class, 'owner_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
    /**
     * @return HasMany
     */
    public function banks(): HasMany
    {
        return $this->hasMany(Bank::class, 'user_id', 'id');
    }
    /**
     * @return HasMany
     */
    public function creditCards(): HasMany
    {
        return $this->hasMany(CreditCard::class, 'user_id', 'id');
    }

    /**
     * Parent of any user doesn't matter the type
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Subscribers of an admin
     *
     * @return HasMany
     * @throws Exception
     */
    public function subscribers(): HasMany
    {
        if ($this->type == 'subscriber') {
            throw new \Exception("User of type [Subscriber] is not allowed to have subscribers", 1);
        }
        if ($this->type == 'member') {
            throw new \Exception("User of type [Member] is not allowed to have subscribers", 1);
        }
        return $this->hasMany(User::class, 'owner_id');
    }

    /**
     * Members of a subscriber
     *
     * @return HasMany
     * @throws Exception
     */
    public function members(): HasMany
    {
        if ($this->type == 'member') {
            throw new \Exception("User of type [Member] is not allowed to have members", 1);
        }
        if ($this->type == 'admin') {
            throw new \Exception("User of type [Admin] is not allowed to have members", 1);
        }
        return $this->hasMany(User::class, 'owner_id');
    }

    #---Relations---#

    #---Scopes---#

    public function scopeAdmin(Builder $q): void
    {
        $q->where('type', 'admin');
    }

    #---Scopes---#

}
