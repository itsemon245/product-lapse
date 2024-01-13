<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    // Define the one-to-many relationship with the Package model
    public function packages()
    {
        return $this->hasMany(Package::class);
    }

    // Define the one-to-many relationship with the Product model
    public function products()
    {
        return $this->hasMany(Product::class, 'owner_id', 'id');
    }

    public function changes()
    {
        return $this->hasMany(Change::class);
    }

    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
    public function reports()
    {
        return $this->hasMany(Report::class);
    }
    public function supports()
    {
        return $this->hasMany(Support::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
    public function releases(){
        return $this->hasMany(Release::class);
    }
}
