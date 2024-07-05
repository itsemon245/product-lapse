<?php

namespace App\Providers;

use App\Models\Page;
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
        View::composer('*', function () {
            $locale = request()->cookie('locale');
            if ($locale) {
                app()->setLocale(request()->cookie('locale'));
            }
        });
        if (env('APP_INSTALLED')) {
            View::composer('layouts.frontend.footer', function ($view) {
                $extraPages = Page::where('type', 'footer')->get(['id', 'slug', 'title']);
                $view->with([
                    'extraPages' => $extraPages,
                ]);
            });
        }

    }
}
