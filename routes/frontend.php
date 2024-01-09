<?php 

use App\Http\Controllers\Frontend\LandingPageController;
use Illuminate\Support\Facades\Route;

Route::prefix('frontend')
->group(function(){
    Route::post('landing-page', [LandingPageController::class, 'update'])->name('landing.page.update');
});