<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangeController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Features\Product\ProductStageController;
use App\Http\Controllers\Features\Product\ProductCategoryController;


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

Route::get('/dashboard', [DashboardController::class, 'index'])
    // ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('package', PackageController::class);
Route::resource('product', ProductController::class);
Route::resource('change', ChangeController::class);
Route::resource('delivery', DeliveryController::class);
// Route::post('/deliveryy/storyy', [DeliveryController::class, 'storyy'])->name('deliveryy.storyy');

Route::resource('product-category', ProductCategoryController::class);
Route::resource('product-stage', ProductStageController::class);




require __DIR__ . '/auth.php';
require __DIR__ . '/invitation.php';
require __DIR__ . '/frontend.php';
require __DIR__ . '/support.php';
