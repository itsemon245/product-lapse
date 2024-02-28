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
        $subscribers = User::where('type', 'subscriber')->get();
        $verifySubscriber = User::where([
            'email_verified_at' => !null,
            'type' => 'subscriber',
        ])->get();
        $notVerifySubScriber = User::where('email_verified_at', null)->get();
        $orders = Order::get();
        $completedOrder = Order::where('status', 'completed')->get();
        $pendingOrder = Order::where('status', 'pending')->get();
        $failedOrder = Order::where('failed_at', !null)->get();
        return view('dashboard.admin', compact('subscribers', 'verifySubscriber', 'notVerifySubScriber', 'orders', 'completedOrder', 'pendingOrder', 'failedOrder'));
    }
}
