<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\Frontend\LandingPageController;
use App\Http\Controllers\Features\Certificate\CertificateController;

Route::prefix('admin')
    ->group(function () {
        Route::resource('faqs', FaqController::class)->except('show');
        Route::resource('package', PackageController::class);
        Route::get('/edit-about-us', [LandingPageController::class, 'editAboutUs'])->name('edit.about_us');
        Route::put('/update-about-us/{id}', [LandingPageController::class, 'updateAboutUs'])->name('about_us.update');
        
        Route::get('/edit-intro', [LandingPageController::class, 'editIntro'])->name('edit.intro');
        Route::put('/update-intro/{id}', [LandingPageController::class, 'updateIntro'])->name('intro.update');
        
        Route::get('/edit-contact-us', [LandingPageController::class, 'editContact'])->name('edit.contact.us');
        Route::put('/update-contact/{id}', [LandingPageController::class, 'updateContactUs'])->name('contact.us.update');
        
        Route::get('/edit-package/{id}', [LandingPageController::class, 'editPackage'])->name('edit.package');
        // Route::put('/update-package/{id}', [LandingPageController::class, 'updatePackage'])->name('package.update');
        Route::get('certificate', [CertificateController::class, 'getAllCertificate'])->name('admin.certificate');
        Route::get('certificate-search', [CertificateController::class, 'search'])->name('search.certificate');
        Route::get('input-create', [LandingPageController::class, 'createInput'])->name('input.create');
    });
