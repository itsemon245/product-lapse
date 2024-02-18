<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
 * Dashboard is prefixed by default
|
 */

Route::get('/', [ DashboardController::class, 'index' ])->name('dashboard');

require __DIR__ . '/support.php';
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
require __DIR__ . '/features.php';
require __DIR__ . '/comment.php';
require __DIR__ . '/delivery.php';

