<?php
namespace App\Traits;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasProducts
{
    /**
     * Get all of the tags for the post.
     */
    public function products(): MorphToMany
    {
        return $this->morphToMany(Product::class, 'productable');
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::created(function ($model) {
            DB::table('productables')->insert([
                'product_id'       => productId(),
                'productable_id'   => $model->id,
                'productable_type' => __CLASS__,
                'user_id'          => auth()->id(),
             ]);
        });
    }
}
