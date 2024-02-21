<?php

use App\Http\Controllers\Features\CommentController;
use Illuminate\Support\Facades\Route;

Route::resource('comment', CommentController::class);
Route::post('comment-status/{comment}/{status}', [CommentController::class, 'toggleStatus'])->name('comment.status');
