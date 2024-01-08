<?php

use App\Http\Controllers\Features\Task\TaskController;
use Illuminate\Support\Facades\Route;


Route::resource('task', TaskController::class);