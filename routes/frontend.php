<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\LandingPageController;

Route::prefix('frontend')
    ->group(function () {
        Route::post('landing-page', [ LandingPageController::class, 'update' ])->name('landing.page.update');
        Route::post('landing-page-about', [ LandingPageController::class, 'updateAbout' ])->name('landing.page.update.about');
        Route::post('landing-page-contact', [ LandingPageController::class, 'updateContact' ])->name('landing.page.update.contact');
    });

Route::prefix('/')
    ->middleware([ 'auth' ])
    ->group(function () {
        Route::get('notifications', function(){
            $user = User::find(auth()->id());
            $notifications = $user->notifications;
            return view('pages.notifications', compact('notifications'));
        })->name('notifications');
    });
