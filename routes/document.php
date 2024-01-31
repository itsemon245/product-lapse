<?php
use App\Http\Controllers\Features\Document\DocumentController;
use Illuminate\Support\Facades\Route;


Route::resource('document', DocumentController::class);
Route::post('document/download/{id}', [DocumentController::class, 'download'])->name('document.download');
Route::get('document/search', [DocumentController::class, 'search'])->name('document.search');