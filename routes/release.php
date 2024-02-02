<?php

use App\Http\Controllers\Features\Release\ReleaseController;
use Illuminate\Support\Facades\Route;

Route::resource('release', ReleaseController::class);
Route::get('release-search', [ReleaseController::class, 'search'])->name('release.search');
