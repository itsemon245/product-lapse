<?php 
namespace App\Traits;

use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasProducts
{
    /**
     * Get all of the tags for the post.
     */
    public function products(): MorphToMany
    {
        return $this->morphToMany(Product::class, 'taggable');
    }
}

?>