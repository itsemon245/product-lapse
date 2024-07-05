<?php

use App\Http\Controllers\Admin\DemoRequestController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\UsersManagementController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\Features\Certificate\CertificateController;
use App\Http\Controllers\Frontend\LandingPageController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Package\PackageFeatureController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Models\DemoRequest;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')
    ->middleware('auth', 'verified', 'check.admin')
    ->group(function () {
        Route::get('/', [AdminController::class, 'admin'])->name('admin');
        Route::match(['put', 'patch'], '/settings', [AdminController::class, 'settings'])->name('settings.update');
        Route::get('/settings/edit', [AdminController::class, 'editSettings'])->name('settings.edit');
        Route::resource('faqs', FaqController::class)->except('show');
        Route::resource('package', PackageController::class);
        Route::resource('package-feature', PackageFeatureController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::get('product-feature/search', [PackageFeatureController::class, 'search'])->name('package-feature.search');
        Route::get('/edit-about-us', [LandingPageController::class, 'editAboutUs'])->name('edit.about_us');
        Route::put('/update-about-us/{id}', [LandingPageController::class, 'updateAboutUs'])->name('about_us.update');

        Route::get('/edit-intro', [LandingPageController::class, 'editIntro'])->name('edit.intro');
        Route::put('/update-intro/{id}', [LandingPageController::class, 'updateIntro'])->name('intro.update');

        Route::get('/edit-contact-us', [LandingPageController::class, 'editContact'])->name('edit.contact.us');
        Route::put('/update-contact/{id}', [LandingPageController::class, 'updateContactUs'])->name('contact.us.update');

        Route::get('/edit-package/{id}', [LandingPageController::class, 'editPackage'])->name('edit.package');
        // Route::put('/update-package/{id}', [LandingPageController::class, 'updatePackage'])->name('package.update');
        Route::get('certificates', [CertificateController::class, 'getAllCertificate'])->name('admin.certificate');
        Route::get('certificate-search', [CertificateController::class, 'search'])->name('search.certificate');
        Route::get('certificate-filter', [CertificateController::class, 'filter'])->name('filter.certificate');
        Route::delete('certificate-delete/{id}', [CertificateController::class, 'delete'])->name('admin.certificate.destroy');
        Route::post('certificate-approval/{id}', [CertificateController::class, 'approval'])->name('certificate.approval');
        Route::post('certificate-cancel/{id}', [CertificateController::class, 'cancel'])->name('certificate.cancel');
        Route::get('input-create', [LandingPageController::class, 'createInput'])->name('input.create');
        Route::resource('users', UsersManagementController::class);
        Route::post('ban-user/{user}', [UsersManagementController::class, 'ban'])->name('user.ban');
        Route::post('active-user/{user}', [UsersManagementController::class, 'active'])->name('user.active');
        Route::get('users-search', [UsersManagementController::class, 'search'])->name('users.search');
        Route::get('users-filter', [UsersManagementController::class, 'filter'])->name('users.filter');
        Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile.index');
        Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('admin.profile.edit');
        Route::patch('/profile/update/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');
        Route::get('order', [OrderController::class, 'index'])->name('admin.order.index');
        Route::patch('order/approve/{id}', [OrderController::class, 'approve'])->name('admin.order.approve');
        Route::post('order/plan/update/{id}', [OrderController::class, 'updatePlan'])->name('admin.order.plan.update');
        Route::get('order/show/{id}', [OrderController::class, 'show'])->name('admin.order.show');
        Route::get('order/search', [OrderController::class, 'search'])->name('admin.order.search');
        Route::resource('features', FeatureController::class)->except('show');
        Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contact.messages');
        Route::get('contact-messages/{contactMessage}', [ContactMessageController::class, 'view'])->name('contact.messages.view');
        Route::post('contact-message-reply/{contactMessage}', [ContactMessageController::class, 'reply'])->name('message.reply.send');
        Route::delete('contact-massage-delete/{id}', [ContactMessageController::class, 'destroy'])->name('admin.contact.message.delete');

        Route::resource('page', PageController::class);

        Route::get('browse-logs', function () {
            return redirect(url('/admin/logs?file=7d8cb50c-laravel.log'));
        })->name('admin.logs');

        Route::resource('demo-request', DemoRequestController::class)->only([
            'index',
            'destroy',
        ]);
    });
