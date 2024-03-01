<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function admin()
    {
        $subscribers = User::where('type', 'subscriber')->count();
        $revenue = Order::whereNot('status', 'completed')->sum('amount');
        $todaysSales = Order::whereDate('completed_at', today())->whereNot('status', 'completed')->count();
        $pendingOrders = Order::where('status', 'pending')->count();
        return view('dashboard.admin', compact('subscribers','revenue','todaysSales', 'pendingOrders'));
    }

    public function settings(Request $request) {
        if ($request->input('_method') == 'patch' || $request->input('_method') == 'put') {
            setEnv(['APP_NAME' => 'Product Lapse', 'SEEDING' => 'false']);

            // Artisan::call('config:cache');
        }

        return view('admin.settings');
    }
}
