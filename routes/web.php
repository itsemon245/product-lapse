<?php

use App\Http\Controllers\ChangeController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ ProfileController::class, 'edit' ])->name('profile.edit');
    Route::patch('/profile', [ ProfileController::class, 'update' ])->name('profile.update');
    Route::delete('/profile', [ ProfileController::class, 'destroy' ])->name('profile.destroy');
});

Route::resource('package', PackageController::class);
Route::resource('change', ChangeController::class);
Route::resource('delivery', DeliveryController::class);
// Route::post('/deliveryy/storyy', [DeliveryController::class, 'storyy'])->name('deliveryy.storyy');
Route::post('set-locale', function (Request $request) {
        $response = new Illuminate\Http\Response('Hello World');
    if(empty($request->toggle)){
        $response->withCookie(cookie()->forever('lang', 'ar'));
        app()->setLocale('ar');
    }
    return $response;

})->name('lang.toggle');

require __DIR__ . '/auth.php';
require __DIR__ . '/frontend.php';
require __DIR__ . '/productHistory.php';
