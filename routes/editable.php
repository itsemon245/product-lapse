<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EditableController;


Route::post('update', [EditableController::class, 'update'])->name('editable.update');