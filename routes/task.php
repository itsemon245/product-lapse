<?php

use App\Http\Controllers\Features\Task\TaskController;
use Illuminate\Support\Facades\Route;


Route::resource('task', TaskController::class);
Route::get('task/{task}/file/{file}/download', [TaskController::class, 'downloadFile'])->name('task.file.download');
Route::put('task/change-status/{task}', [TaskController::class, 'changeStatus'])->name('task.change.status');
Route::get('task-search', [TaskController::class, 'search'])->name('task.search');