<?php
namespace App\Traits;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasCreator
{
    /**
     * The "booted" method of the model.
     */
    protected static function creator(): void
    {
        static::created(function ($model) {
            DB::table('creatortables')->insert([
                'creator_id'       => auth()->id(),
                'creatortable_id'   => $model->id,
                'creatortable_type' => __CLASS__,
             ]);
        });
    }
}
