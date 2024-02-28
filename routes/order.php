<?php

use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Order\PaymentController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')
    ->group(function () {
        Route::get('order/{package}/create', [ OrderController::class, 'create' ])->name('order.create')->middleware('check.address');
        Route::get('order/{order}/select-method', [ OrderController::class, 'selectMethod' ])->name('order.selectMethod');
        Route::get('order-free/{order}/', [ OrderController::class, 'freePackage' ])->name('order.free');
        Route::post('order/{order}', [ OrderController::class, 'store' ])->name('order.store');

        // Payment
        Route::any('payment-ipn', [ PaymentController::class, 'ipn' ])->name('payment.ipn');
        Route::any('payment-callback', [ PaymentController::class, 'callback' ])->name('payment.callback');
        Route::get('payment-success', [ PaymentController::class, 'success' ])->name('payment.success');
        Route::get('payment-failed', [ PaymentController::class, 'failed' ])->name('payment.failed');
    })

?>
