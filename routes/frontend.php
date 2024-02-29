<?php

use App\Models\Page;
use App\Models\User;
use App\Models\Package;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\LandingPageController;

Route::prefix('frontend')
    ->group(function () {
        Route::post('landing-page', [LandingPageController::class, 'update'])->name('landing.page.update');
        Route::post('landing-page-about', [LandingPageController::class, 'updateAbout'])->name('landing.page.update.about');
        Route::post('landing-page-contact', [LandingPageController::class, 'updateContact'])->name('landing.page.update.contact');
    });

Route::prefix('/')
    ->middleware(['auth'])
    ->group(function () {
        Route::get('notifications', function () {
            $user = User::find(auth()->id());
            $notifications = $user->notifications;
            return view('pages.notifications', compact('notifications'));
        })->name('notifications');

        Route::get('update-address', [ProfileController::class, 'editAddress'])->name('address.edit');
        Route::get('upgrade-package', function(){
            $packages = Package::get();
            return view('packages.index', compact('packages'));
        })->name('package.upgrade');
    });
Route::get('page/{page}', function(Page $page){

    return view('pages.extra', compact('page'));
})->name('page.extra');

Route::get('compare-packages', [PackageController::class, 'compare'])->name('package.compare');
Route::post('contact-message/', [ContactMessageController::class, 'send'])->name('message.send');

