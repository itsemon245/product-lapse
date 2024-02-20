<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Features\Support\SupportController;



Route::resource('support', SupportController::class);
Route::put('support/update-status/{support}', [SupportController::class, 'updateStatus'])->name('support.update.status');
Route::get('support-search', [SupportController::class, 'search'])->name('support.search');