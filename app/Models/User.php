<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Casts\Utils\JsonCast;
use App\Models\Comment;
use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasImages;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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
    public function comments()
    {
        return $this->hasMany(Comment::class);
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
