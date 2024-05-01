<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Features\Change\ChangeController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
 * Dashboard is prefixed by default
|
 */

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
require __DIR__.'/product.php';
require __DIR__.'/select.php';
require __DIR__.'/certificate.php';

// Workspace switch route
Route::post('workspace/{user}/change', function (Request $request, User $user) {
    Auth::login($user, true);
    notify()->success('Switched Workspace!');

    return redirect('dashboard');
})->name('workspace.change');

Route::middleware('check.active.product')
    ->group(function () {
        Route::resource('change', ChangeController::class);
        require __DIR__.'/support.php';
        require __DIR__.'/invitation.php';
        require __DIR__.'/report.php';
        require __DIR__.'/release.php';
        require __DIR__.'/productHistory.php';
        require __DIR__.'/document.php';
        require __DIR__.'/idea.php';
        require __DIR__.'/task.php';
        require __DIR__.'/team.php';
        require __DIR__.'/comment.php';
        require __DIR__.'/delivery.php';
    });
