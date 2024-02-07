<?php

use App\Http\Controllers\Features\Certificate\CertificateController;
use Illuminate\Support\Facades\Route;


Route::resource('certificate', CertificateController::class);
Route::get('get-certificate', [CertificateController::class, 'getCertificate'])->name('get.certificate');
Route::get('certificate-status', [CertificateController::class, 'certificateStatus'])->name('certificate.status');
Route::post('certificate-approval/{id}', [CertificateController::class, 'approval'])->name('certificate.approval');