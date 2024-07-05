<?php

use App\Http\Controllers\Frontend\InstallController;
use Illuminate\Support\Facades\Route;

Route::middleware('app.not.installed')
    ->group(function () {
        Route::get('install', [InstallController::class, 'index'])->name('app.install.index');
        Route::post('install', [InstallController::class, 'store'])->name('app.install.store');
    });
