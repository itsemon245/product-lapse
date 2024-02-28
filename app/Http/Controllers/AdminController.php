<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admin()
    {
        $subscribers = User::where('type', 'subscriber')->count();
        $verifySubscriber = User::where([
            'email_verified_at' => !null,
            'type' => 'subscriber',
        ])->count();
        $notVerifySubScriber = User::where('email_verified_at', null)->count();
        $orders = Order::whereNot('status', 'draft')->count();
        $completedOrder = Order::where('status', 'completed')->count();
        $pendingOrder = Order::where('status', 'pending')->count();
        $failedOrder = Order::where('status', 'failed')->count();
        return view('dashboard.admin', compact('subscribers', 'verifySubscriber', 'notVerifySubScriber', 'orders', 'completedOrder', 'pendingOrder', 'failedOrder'));
    }
}
