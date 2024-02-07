<?php

use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;

Route::resource('faqs', FaqController::class)->except('show');