<?php
namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

            $creatorId = auth()->user()?->id;
            // Only in development and local server
            if (env('SEEDING') ) {
                $creatorId = demoSub()->id;
            }
            $model->creator_id = $creatorId;
            $model->saveQuietly();
        });
    }
}
