<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ChangeRequestController;
use App\Http\Controllers\DeliverableController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Features\Product\ProductCategoryController;
use App\Http\Controllers\Features\Product\ProductStageController;
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
Route::resource('change-request', ChangeRequestController::class);
Route::resource('deliverable', DeliverableController::class);

Route::resource('product-category', ProductCategoryController::class);
Route::resource('product-stage', ProductStageController::class);




require __DIR__ . '/auth.php';
