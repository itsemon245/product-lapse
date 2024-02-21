<?php

use App\Http\Controllers\Order\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('order/{package}/create', [OrderController::class, 'create'])->name('order.create');
Route::get('order/{order}/select-method', [OrderController::class, 'selectMethod'])->name('order.selectMethod');
Route::post('order/{order}', [OrderController::class, 'store'])->name('order.store');

?>