<?php

use App\Http\Controllers\Frontend\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::prefix('frontend')
    ->group(function () {
        Route::post('landing-page', [LandingPageController::class, 'update'])->name('landing.page.update');
        Route::post('landing-page-about', [LandingPageController::class, 'updateAbout'])->name('landing.page.update.about');
        Route::post('landing-page-contact', [LandingPageController::class, 'updateContact'])->name('landing.page.update.contact');
    });

