<?php

use App\Http\Controllers\Features\Certificate\CertificateController;
use App\Http\Controllers\Features\Change\ChangeController;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Features\Delivery\DeliveryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', function () {
    $info = LandingPage::first();
    $faqs = Faq::where('status', true)->get();
    $features = Feature::where('status', true)->get();

    return view('welcome', compact('info', 'faqs', 'features'));
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//Super admin Routes
Route::resource('package', PackageController::class);
Route::get('admin-certificate', [CertificateController::class, 'getAllCertificate'])->name('admin.certificate');



Route::resource('change', ChangeController::class);
Route::get('change-search', [ChangeController::class, 'search'])->name('change.search');
Route::resource('delivery', DeliveryController::class);
Route::get('delivery-search', [DeliveryController::class, 'search'])->name('delivery.search');
Route::post('set-locale', function (Request $request) {
    $cookie = request()->cookie('locale');
    if ($cookie == null) {
        $cookie = Cookie::forever('locale', 'en');
    } elseif ($cookie == 'en') {
        $cookie = Cookie::forever('locale', 'ar');
    } else {
        $cookie = Cookie::forever('locale', 'en');
    }
    // dd($cookie);
    return back()->withCookie($cookie);

})->name('lang.toggle');

require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
require __DIR__ . '/editable.php';
