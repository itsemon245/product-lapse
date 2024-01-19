<?php

use App\Http\Controllers\Frontend\LandingPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Features\Product\ProductHistoryController;



//product-history index route 
Route::get('product-history/{product}', [ProductHistoryController::class, 'index'])->name('product-history.index');

//product-history store route
Route::post('product-history/{id}', [ProductHistoryController::class, 'store'])->name('product-history.store');