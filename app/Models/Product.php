<?php

namespace App\Models;

use App\Traits\HasImages;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Database\Eloquent\Relations\MorphMany;
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


    #---Morph Relations----#

    /**
     * Get all of the tasks that are assigned this tag.
     */
    public function tasks(): MorphToMany
    {
        return $this->morphedByMany(Task::class, 'productable');
    }
    /**
     * Get all of the tasks that are assigned this tag.
     */
    public function ideas(): MorphToMany
    {
        return $this->morphedByMany(Idea::class, 'productable');
    }

    public function supports(): MorphToMany
    {
        return $this->morphedByMany(Support::class, 'productable');
    }

    public function changeManagements(): MorphToMany
    {
        return $this->morphedByMany(Change::class, 'productable');
    }

    public function documents(): MorphToMany
    {
        return $this->morphedByMany(Document::class, 'productable');
    }

    public function teams(): MorphToMany
    {
        return $this->morphedByMany(ProductUser::class, 'productable');
    }

    public function reports(): MorphToMany
    {
        return $this->morphedByMany(Report::class, 'productable');
    }

    public function releases(): MorphToMany
    {
        return $this->morphedByMany(Release::class, 'productable');
    }

    public function deliveries(): MorphToMany
    {
        return $this->morphedByMany(Delivery::class, 'productable');
    }

    /**
     * Get all of the product history that are assigned this product
     */
    public function productHistories()
    {
        return $this->morphedByMany(ProductHistory::class, 'productable');
    }
}
