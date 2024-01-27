<?php

use App\Http\Controllers\Features\Certificate\CertificateController;
use Illuminate\Support\Facades\Route;


Route::resource('certificate', CertificateController::class);