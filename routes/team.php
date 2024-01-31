<?php

use App\Http\Controllers\Features\Task\TaskController;
use App\Http\Controllers\Features\Team\TeamController;
use Illuminate\Support\Facades\Route;


Route::resource('team', TeamController::class);
Route::get('team/search',[TeamController::class, 'search'])->name('team.search');
