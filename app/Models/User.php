<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Comment;
use App\Traits\HasImages;
use App\Casts\Utils\JsonCast;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles, HasImages;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

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
        'password' => 'hashed',
        'flag' => JsonCast::class,
    ];

    #---Relations---#

    public function plans()
    {
        return $this->hasMany(Plan::class);
    }

    public function activePlan()
    {
        return $this->plans()->where('expired_at', '>', now())->where('active', true)->limit(1);
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
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function getRole()
    {
        return $this->roles->first();
    }
    public function packages()
    {
        return $this->hasMany(Package::class, 'owner_id', 'id');
    }

    public function productUsers()
    {
        return $this->hasMany(ProductUser::class, 'owner_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'owner_id', 'id');
    }
    public function myProducts()
    {
        return $this->belongsToMany(Product::class, 'product_users');
    }

    public function changes()
    {
        return $this->hasMany(Change::class, 'owner_id', 'id');
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class, 'owner_id', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'owner_id', 'id');
    }
    public function reports()
    {
        return $this->hasMany(Report::class, 'owner_id', 'id');
    }
    public function supports()
    {
        return $this->hasMany(Support::class, 'owner_id', 'id');
    }

    public function documents()
    {
        return $this->hasMany(Document::class, 'owner_id', 'id');
    }
    public function releases()
    {
        return $this->hasMany(Release::class, 'owner_id', 'id');
    }
    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'owner_id', 'id');
    }
    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function banks()
    {
        return $this->hasMany(Bank::class, 'user_id', 'id');
    }

    public function creditCards()
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

    public function scopeAdmin(Builder $q)
    {
        $q->where('type', 'admin');
    }

    #---Scopes---#

}
