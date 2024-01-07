<?php

use App\Http\Controllers\Features\Product\InvitationController;
use Illuminate\Support\Facades\Route;

Route::resource('invitation', InvitationController::class);

Route::get('invitation/accept/{token}', [InvitationController::class, 'accept'])->name('invitation.accept');
Route::post('invitation/password-store', [InvitationController::class, 'passwordStore'])->name('invitation.password-store');