<?php

use App\Http\Controllers\Frontend\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::prefix('frontend')
    ->group(function () {
        Route::post('landing-page', [LandingPageController::class, 'update'])->name('landing.page.update');
        Route::post('landing-page-about', [LandingPageController::class, 'updateAbout'])->name('landing.page.update.about');
        Route::post('landing-page-contact', [LandingPageController::class, 'updateContact'])->name('landing.page.update.contact');
    });

Route::get('/edit-about-us', [LandingPageController::class, 'editAboutUs'])->name('edit.about_us');
Route::put('/update-about-us/{id}', [LandingPageController::class, 'updateAboutUs'])->name('about_us.update');

Route::get('/edit-intro', [LandingPageController::class, 'editIntro'])->name('edit.intro');
Route::put('/update-intro/{id}', [LandingPageController::class, 'updateIntro'])->name('intro.update');