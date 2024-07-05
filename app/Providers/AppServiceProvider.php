<?php

namespace App\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blueprint::macro('hasCreator', function () {
            $table = $this;
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->foreign('creator_id')->references('id')->on('users');
        });
        Blueprint::macro('hasOwner', function () {
            $table = $this;
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->cascadeOnDelete();
        });
        Blueprint::macro('hasCreatorAndOwner', function () {
            $table = $this;
            $table->hasCreator();
            $table->hasOwner();
        });
    }
}
