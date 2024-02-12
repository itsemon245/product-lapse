<?php
namespace App\Traits;

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasCreator
{
    /**
     * The Model is in use will belong to user as creator
     *
     * @return BelongsTo
     */ 
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'creator_id');
    }
    protected static function bootHasCreator(): void
    {
        static::created(function ($model) {
            $model->creator_id = auth()->id();
            $model->save();
        });
    }
}
