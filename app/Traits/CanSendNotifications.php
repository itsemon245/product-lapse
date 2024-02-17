<?php
namespace App\Traits;

use App\Models\Product;
use App\Models\User;
use App\Notifications\CreateNotification;
use Illuminate\Support\Facades\Notification;

trait CanSendNotifications
{

    /**
     * The "booted" method of the model.
     */
    protected static function bootCanSendNotifications(): void
    {
        static::created(function ($model) {
            $initiator = $model->creator ?? $model->user;
            $users     = Product::find(productId())->users->reject(function (User $user) use ($initiator) {
                return $user->id == $initiator->id;
            });
            if ($users->count() > 0) {
                Notification::send($users, new CreateNotification($initiator));
            }
        });
    }
}
