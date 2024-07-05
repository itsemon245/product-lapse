<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Casts\Utils\JsonCast;
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
    use HasApiTokens, HasFactory, HasImages, HasRoles, Notifiable;

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

    //---Attributes---#

    public function getFullNameAttribute(): string
    {
        return $this->first_name.' '.$this->last_name;
    }
    //---Attributes---#

    //---Relations---#

    public function plans(): HasMany
    {
        return $this->hasMany(Plan::class);
    }

    public function activePlan()
    {
        return $this->plans()
            ->active()
            ->limit(1);
    }

    public function activePackage()
    {
        return $this->activePlan()->first()?->package;
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

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function getRole()
    {
        return $this->roles->first();
    }

    public function productUsers(): HasMany
    {
        return $this->hasMany(ProductUser::class, 'owner_id', 'id');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class, 'owner_id', 'id');
    }

    public function myProducts(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_users');
    }

    public function tasks(): BelongsToMany
    {
        return $this->belongsToMany(Task::class, 'task_user');
    }

    public function changes(): HasMany
    {
        return $this->hasMany(Change::class, 'owner_id', 'id');
    }

    public function ideas(): HasMany
    {
        return $this->hasMany(Idea::class, 'owner_id', 'id');
    }

    // /**
    //  * @return HasMany
    //  */
    // public function tasks(): HasMany
    // {
    //     return $this->hasMany(Task::class, 'owner_id', 'id');
    // }
    public function reports(): HasMany
    {
        return $this->hasMany(Report::class, 'owner_id', 'id');
    }

    public function supports(): HasMany
    {
        return $this->hasMany(Support::class, 'owner_id', 'id');
    }

    public function documents(): HasMany
    {
        return $this->hasMany(Document::class, 'owner_id', 'id');
    }

    public function releases(): HasMany
    {
        return $this->hasMany(Release::class, 'owner_id', 'id');
    }

    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class, 'owner_id', 'id');
    }

    public function addresses(): HasMany
    {
        return $this->hasMany(Address::class, 'user_id', 'id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function banks(): HasMany
    {
        return $this->hasMany(Bank::class, 'user_id', 'id');
    }

    public function creditCards(): HasMany
    {
        return $this->hasMany(CreditCard::class, 'user_id', 'id');
    }

    /**
     * Parent of any user doesn't matter the type
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Subscribers of an admin
     *
     * @throws Exception
     */
    public function subscribers(): HasMany
    {
        if ($this->type == 'subscriber') {
            throw new \Exception('User of type [Subscriber] is not allowed to have subscribers', 1);
        }
        if ($this->type == 'member') {
            throw new \Exception('User of type [Member] is not allowed to have subscribers', 1);
        }

        return $this->hasMany(User::class, 'owner_id');
    }

    /**
     * Members of a subscriber
     *
     * @throws Exception
     */
    public function members(): HasMany
    {
        if ($this->type == 'member') {
            throw new \Exception('User of type [Member] is not allowed to have members', 1);
        }
        if ($this->type == 'admin') {
            throw new \Exception('User of type [Admin] is not allowed to have members', 1);
        }

        return $this->hasMany(User::class, 'owner_id');
    }

    public function workspaces(): HasMany
    {
        return $this->hasMany(User::class, 'main_account_id');
    }

    public function mainAccount(): BelongsTo
    {
        return $this->belongsTo(User::class, 'main_account_id');
    }
    //---Relations---#

    //---Scopes---#

    public function scopeAdmin(Builder $q): void
    {
        $q->where('type', 'admin');
    }

    //---Scopes---#

    //--- Methods ---#
    public function activeWorkspaceName()
    {
        return $this->type == 'member' ? $this->owner()->first()->name : trans('My Workspace');
    }

    public function isSubAccount(): bool
    {
        return $this->main_account_id != null;
    }
}
