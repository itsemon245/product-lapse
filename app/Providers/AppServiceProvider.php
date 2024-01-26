<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer('*', function ($view) {
            $cookie = request()->cookie('locale');
            if (isset($cookie) && !Str::contains($cookie, array('en', 'ar'))) {
                $decrypted = decrypt($cookie, false);
                $arr       = explode('|', $decrypted);
                $locale    = array_pop($arr);
            } else {
                $locale = $cookie;
            }
            app()->setLocale($locale);
        });
    }
}
