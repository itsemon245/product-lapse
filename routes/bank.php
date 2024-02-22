<?php
use App\Http\Controllers\BankController;

Route::resource('bank', BankController::class);
Route::GET('credit/card', [BankController::class, 'creditCard'])->name('credit.card');
Route::post('credit/card/store', [BankController::class, 'creditCardStore'])->name('credit.card.store');

