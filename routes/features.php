<?php

use App\Http\Controllers\FeatureController;
use Illuminate\Support\Facades\Route;

Route::resource('features', FeatureController::class)->except('show');