<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Features\Idea\IdeaController;


Route::resource('idea', IdeaController::class);
Route::get('idea-filter', [IdeaController::class, 'filter'])->name('idea.filter');
Route::get('idea-search', [IdeaController::class, 'search'])->name('idea.search');