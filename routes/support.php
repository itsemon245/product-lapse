<?php 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Features\Support\SupportController;



Route::resource('support', SupportController::class);