<?php

namespace App\Providers;

use App\Models\LandingPage;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

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
        view()->composer('*', function (View $view) {
            $landingPage = LandingPage::first();
            $view->with('landingPage', $landingPage);
        });
    }
}
