<?php 

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Features\SelectController;

Route::resource('select', SelectController::class)->except('show');

?>