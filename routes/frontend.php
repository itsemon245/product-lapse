<?php 

use App\Http\Controllers\Frontend\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::resource('landing-page', LandingPageController::class);