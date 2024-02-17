<?php
namespace App\Traits;

use App\Models\User;
use App\Models\Scopes\OwnerScope;
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
            if (auth()->user()?->type == 'member') {
                $ownerId = auth()->user()?->owner_id;
            }else{
                $ownerId = auth()->user()?->id;   
            }
            // Only in development and local server
            if (config('app.env') == 'local' && config('app.debug') == true) {
                $ownerId = demoSub()->id;
            }
            $model->owner_id = $ownerId;
            $model->save();
        });

        static::addGlobalScope(new OwnerScope);
    }
}
