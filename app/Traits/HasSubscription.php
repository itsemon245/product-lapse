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
            $user = User::find($model->user_id);
            $user->update(['type' => 'subscriber']);
            $user->assignRole('account holder');
        });

    }
}
?>