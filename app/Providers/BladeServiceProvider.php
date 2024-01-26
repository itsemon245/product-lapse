<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        $cookie = request()->cookie('locale');
        $decrypted = decrypt($cookie, false);
        $arr = explode('|', $decrypted);
        $locale = array_pop($arr);
        app()->setLocale($locale);
        Blade::directive('__', function ($expression) {
            return "<?php echo __($expression) ?>";
        });
        Blade::directive('trans', function ($expression) {
            return "<?php echo trans($expression) ?>";
        });
    }
}
