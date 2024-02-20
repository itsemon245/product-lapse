<?php
use App\Http\Controllers\Features\Document\DocumentController;
use Illuminate\Support\Facades\Route;


Route::resource('document', DocumentController::class);
Route::post('document/download/{id}', [DocumentController::class, 'download'])->name('document.download');
Route::put('document/update-version/{document}', [DocumentController::class, 'updateVersion'])->name('document.update.version');
Route::get('document-search', [DocumentController::class, 'search'])->name('document.search');