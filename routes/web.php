<?php

use App\Http\Controllers\Features\Certificate\CertificateController;
use App\Http\Controllers\Features\Change\ChangeController;
use App\Models\Contact;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\LandingPage;
use App\Models\Package;
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
    // dd($info->home->title->{app()->getLocale()});
    $faqs = Faq::where('status', true)->get();
    $features = Feature::where('status', true)->get();
    $contact = Contact::first();
    $packages = Package::get();

    return view('welcome', compact('info', 'faqs', 'features', 'contact', 'packages'));
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile/update/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('address', [ProfileController::class, 'address'])->name('address.update');
});
//Super admin Routes




Route::resource('change', ChangeController::class);
Route::put('change/status/{change}', [ChangeController::class, 'updateStatus'])->name('change.update.status');
Route::get('change-search', [ChangeController::class, 'search'])->name('change.search');
// Route::resource('delivery', DeliveryController::class);
// Route::get('delivery-search', [DeliveryController::class, 'search'])->name('delivery.search');
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
require __DIR__ . '/admin.php';
require __DIR__ . '/invitation.php';
require __DIR__.'/order.php';
require __DIR__ . '/bank.php';
