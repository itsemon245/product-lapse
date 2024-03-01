<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Features\Change\ChangeController;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
 * Dashboard is prefixed by default
|
 */

Route::get('/', [ DashboardController::class, 'index' ])->name('dashboard');
Route::resource('change', ChangeController::class);

require __DIR__ . '/support.php';
require __DIR__ . '/invitation.php';
require __DIR__ . '/report.php';
require __DIR__ . '/release.php';
require __DIR__ . '/product.php';
require __DIR__ . '/productHistory.php';
require __DIR__ . '/document.php';
require __DIR__ . '/idea.php';
require __DIR__ . '/task.php';
require __DIR__ . '/select.php';
require __DIR__ . '/team.php';
require __DIR__ . '/certificate.php';
require __DIR__ . '/comment.php';
require __DIR__ . '/delivery.php';



