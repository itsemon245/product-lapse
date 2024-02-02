<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Features\Support\SupportController;



Route::resource('support', SupportController::class);
Route::get('support-search', [SupportController::class, 'search'])->name('support.search');