<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
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
        Blade::directive('__', function ($expression) {
            return "<?php echo __($expression) ?>";
        });
        Blade::directive('trans', function ($expression) {
            return "<?php echo trans($expression) ?>";
        });
        View::composer("*", function () {
            // app()->setLocale(request()->cookie('locale'));
             app()->setLocale('en');
        });
    }
}
