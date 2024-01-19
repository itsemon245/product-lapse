<?php

namespace App\Providers;

use App\Models\Select;
use App\Models\Product;
use Illuminate\Support\ServiceProvider;

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
            // $product = Product::find(2);
            // $value = [
            //     'en'=> 'English Stage',
            //     'ar'=> 'Arabic Stage',
            // ];
            // Select::create([
            //     'owner_id'=> auth()->id(),
            //     'model_type'=> 'product',
            //     'type'=> 'stage',
            //     'value'=> $value
            // ]);
            // $productStages = Select::of('product')->type('stage')->get();
            // dd($productStages); 
        });
    }
}
