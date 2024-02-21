<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Frontend\LandingPageController;
use App\Http\Controllers\PackageController;

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

Route::get('compare-packages', [PackageController::class, 'compare'])->name('package.compare');
Route::post('contact-message/', [ContactMessageController::class, 'send'])->name('message.send');
