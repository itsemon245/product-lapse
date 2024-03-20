<?php

use App\Http\Controllers\Features\Product\InvitationController;
use Illuminate\Support\Facades\Route;

Route::resource('invitation', InvitationController::class);
Route::post('resend-invitation', [InvitationController::class, 'resend'])->name('invitation.resend');