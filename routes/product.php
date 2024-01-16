<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Features\Idea\IdeaController;

Route::resource('product', ProductController::class)->except('show');
Route::prefix('product/{product?}')
->group(function(){
    Route::get('show/', [ProductController::class, 'show']);
    Route::resource('idea', IdeaController::class);
});


?>