<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BankController;

Route::get('bank-payment/{order}', [BankController::class, 'create'])->name('bank.create');
Route::post('bank-store/{order}', [BankController::class, 'store'])->name('bank.store');
Route::GET('credit/card', [BankController::class, 'creditCard'])->name('credit.card');
Route::post('credit/card/store', [BankController::class, 'creditCardStore'])->name('credit.card.store');

