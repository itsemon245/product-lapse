<?php

use App\Http\Controllers\Frontend\LandingPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Features\Product\ProductHistoryController;



//product-history index route 
Route::resource('product-history', ProductHistoryController::class);
Route::post('delete-image', [ProductHistoryController::class, 'deleteImage'])->name('image.delete');