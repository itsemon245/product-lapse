<?php

use App\Http\Controllers\Features\Product\InvitationController;
use Illuminate\Support\Facades\Route;

Route::resource('invitation', InvitationController::class);

Route::post('invitation/password-store', [InvitationController::class, 'passwordStore'])->name('invitation.password-store');