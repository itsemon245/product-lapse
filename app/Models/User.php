<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Comment;
use App\Traits\HasImages;
use App\Casts\Utils\JsonCast;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'flag'=> JsonCast::class 
    ];


    // Define the one-to-many relationship with the Package model
    public function packages()
    {
        return $this->hasMany(Package::class, 'owner_id', 'id');
    }

    // Define the one-to-many relationship with the Product model
    public function products()
    {
        return $this->hasMany(Product::class, 'owner_id', 'id');
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
}
