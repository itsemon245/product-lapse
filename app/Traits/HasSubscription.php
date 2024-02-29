<?php 
namespace App\Traits;

use App\Models\User;

trait HasSubscription {

     /**
     * The "booted" method of the model.
     */
    protected static function bootHasSubscription(): void
    {
        static::created(function ($model) {
            User::find($model->user_id)->update('type', 'subscriber');
        });

    }
}
?>