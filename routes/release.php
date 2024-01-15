<?php

use App\Http\Controllers\Features\Release\ReleaseController;
use Illuminate\Support\Facades\Route;

Route::resource('release', ReleaseController::class);
