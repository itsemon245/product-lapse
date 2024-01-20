<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Features\Idea\IdeaController;
use App\Http\Controllers\Features\Product\ProductStageController;
use App\Http\Controllers\Features\Product\ProductCategoryController;


Route::resource('product', ProductController::class);
Route::resource('product-category', ProductCategoryController::class);
Route::resource('product-stage', ProductStageController::class);
