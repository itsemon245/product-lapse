<?php

use App\Models\Page;
use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\LandingPageController;
use Illuminate\Support\Facades\Hash;

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

        Route::post('workspace/{user}/change', function (Request $request, User $user) {
            // $main = $user->mainAccount;
            // $passMatched = Hash::check($request->password, $main->password);
            // if (!$passMatched) {
            //     notify()->error(trans('auth.password'));
            //     return back();
            // }
            Auth::login($user, true);
            notify()->success('Switched Workspace!');
            return redirect('dashboard');
        })->name('workspace.change');
    });

// Extra pages

Route::get('technical-support', function(Page $page){
    $page = Page::where('slug', 'technical-support')->first();
    return view('pages.extra', compact('page'));
})->name('page.technical-support');
Route::get('terms-conditions', function(Page $page){
    $page = Page::where('slug', 'terms-conditions')->first();
    return view('pages.extra', compact('page'));
})->name('page.terms-conditions');
Route::get('privacy-policy', function(Page $page){
    $page = Page::where('slug', 'privacy-policy')->first();
    return view('pages.extra', compact('page'));
})->name('page.privacy-policy');

Route::get('compare-packages', [PackageController::class, 'compare'])->name('package.compare');
Route::post('contact-message/', [ContactMessageController::class, 'send'])->name('message.send');

