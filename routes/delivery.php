<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Features\Delivery\DeliveryController;


Route::resource('delivery', DeliveryController::class);
Route::get('delivery-search', [DeliveryController::class, 'search'])->name('delivery.search');
Route::post('delivery-agree/{id}', [DeliveryController::class, 'agree'])->name('delivery.agree');
Route::post('delivery-disagree/{id}', [DeliveryController::class, 'disagree'])->name('delivery.disagree');