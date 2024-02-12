<?php

namespace App\Providers;

use App\Models\LandingPage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer("*", function () {
            $locale = request()->cookie('locale');
            if ($locale) {
                app()->setLocale(request()->cookie('locale'));
            }
        });
    }
}
