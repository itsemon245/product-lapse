<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::resource('product', ProductController::class);
Route::get('product-home-filter', [ProductController::class, 'filter'])->name('product.home.filter');
Route::get('product-search', [ProductController::class, 'search'])->name('product.search');
Route::get('product-info', [ProductController::class, 'info'])->name('product.info');