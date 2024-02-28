<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Frontend\LandingPageController;
use App\Http\Controllers\Admin\UsersManagementController;
use App\Http\Controllers\Package\PackageFeatureController;
use App\Http\Controllers\Features\Certificate\CertificateController;

Route::prefix('admin')
    ->middleware('check.admin')
    ->group(function () {
        Route::get('/', function () {
            return view('dashboard.admin');
        })->name('admin');
        Route::resource('faqs', FaqController::class)->except('show');
        Route::resource('package', PackageController::class);
        Route::resource('package-feature', PackageFeatureController::class)->only([ 'index', 'store', 'update', 'destroy' ]);
        Route::get('product-feature/search', [ PackageFeatureController::class, 'search' ])->name('package-feature.search');
        Route::get('/edit-about-us', [ LandingPageController::class, 'editAboutUs' ])->name('edit.about_us');
        Route::put('/update-about-us/{id}', [ LandingPageController::class, 'updateAboutUs' ])->name('about_us.update');

        Route::get('/edit-intro', [ LandingPageController::class, 'editIntro' ])->name('edit.intro');
        Route::put('/update-intro/{id}', [ LandingPageController::class, 'updateIntro' ])->name('intro.update');

        Route::get('/edit-contact-us', [ LandingPageController::class, 'editContact' ])->name('edit.contact.us');
        Route::put('/update-contact/{id}', [ LandingPageController::class, 'updateContactUs' ])->name('contact.us.update');

        Route::get('/edit-package/{id}', [ LandingPageController::class, 'editPackage' ])->name('edit.package');
        // Route::put('/update-package/{id}', [LandingPageController::class, 'updatePackage'])->name('package.update');
        Route::get('certificate', [ CertificateController::class, 'getAllCertificate' ])->name('admin.certificate');
        Route::get('certificate-search', [ CertificateController::class, 'search' ])->name('search.certificate');
        Route::get('input-create', [ LandingPageController::class, 'createInput' ])->name('input.create');
        Route::resource('users', UsersManagementController::class);
        Route::post('ban-user/{user}', [UsersManagementController::class, 'ban'])->name('user.ban');
        Route::get('users-search', [UsersManagementController::class, 'search'])->name('users.search');
        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::patch('/profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::get('order', [OrderController::class, 'index'])->name('admin.order.index');
        Route::patch('order/approve/{id}', [OrderController::class, 'approve'])->name('admin.order.approve');
        Route::get('order/show/{id}', [OrderController::class, 'show'])->name('admin.order.show');
        Route::resource('features', FeatureController::class)->except('show');
        Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contact.messages');
        Route::get('contact-messages/{contactMessage}', [ContactMessageController::class, 'view'])->name('contact.messages.view');
        Route::post('contact-message-reply/{contactMessage}', [ContactMessageController::class, 'reply'])->name('message.reply.send');

    });
