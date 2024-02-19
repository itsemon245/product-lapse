<?php
namespace App\Traits;

use App\Notifications\CreateNotification;
use App\Notifications\DeleteNotification;
use App\Notifications\UpdateNotification;
use Illuminate\Support\Facades\Notification;

trait CanSendNotifications
{

    /**
     * The "booted" method of the model.
     */
    protected static function bootCanSendNotifications(): void
    {
        static::created(function ($model) {
            if (!env('SEEDING', false)) {
                [$users, $initiator, $feature] = getNotificationData($model);
                Notification::send($users, new CreateNotification($initiator, $feature));
            }
        });
        static::updated(function ($model) {
            if (!env('SEEDING', false)) {
                [$users, $initiator, $feature] = getNotificationData($model);
                Notification::send($users, new UpdateNotification($initiator, $feature));
            }
        });
        static::deleting(function ($model) {
            if (!env('SEEDING', false)) {
                [$users, $initiator, $feature] = getNotificationData($model);
                Notification::send($users, new DeleteNotification($initiator, $feature));
            }
        });
    }
}
