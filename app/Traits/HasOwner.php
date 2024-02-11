<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasOwner
{

    /**
     * The Model is in use will belong to user as owner
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * The "booted" method of the model.
     */
    protected static function bootHasOwner(): void
    {
        static::created(function ($model) {
            $model->owner_id = auth()->user()?->owner?->id;
            $model->save();
        });
    }
}
