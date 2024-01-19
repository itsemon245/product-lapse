<?php

namespace App\Models;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Product extends Model
{
    use HasFactory, HasImages;

    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function invitations()
    {
        return $this->hasMany(Invitation::class);
    }

    /**
     * Get all of the tasks that are assigned this tag.
     */
    public function tasks(): MorphToMany
    {
        return $this->morphedByMany(Task::class, 'productable');
    }

    /**
     * Get all of the product history that are assigned this product
     */
    public function productHistory()
    {
        return $this->hasMany(ProductHistory::class);
    }
}
