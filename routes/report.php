<?php

use App\Http\Controllers\Features\Report\ReportController;
use Illuminate\Support\Facades\Route;


Route::resource('report', ReportController::class);
Route::post('report/download/{id}', [ReportController::class, 'download'])->name('report.download');