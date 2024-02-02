<?php

use App\Http\Controllers\Features\Task\TaskController;
use Illuminate\Support\Facades\Route;


Route::resource('task', TaskController::class);
Route::post('task/change-status/{id}', [TaskController::class, 'changeStatus'])->name('task.change.status');
Route::get('task-search', [TaskController::class, 'search'])->name('task.search');