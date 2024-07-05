<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $subscribers = User::where('type', 'subscriber')->count();
        $revenue = Order::whereNot('status', 'completed')->sum('amount');
        $todaysSales = Order::whereDate('completed_at', today())->whereNot('status', 'completed')->count();
        $pendingOrders = Order::where('status', 'pending')->count();

        return view('dashboard.admin', compact('subscribers', 'revenue', 'todaysSales', 'pendingOrders'));
    }

    public function editSettings()
    {
        return view('admin.settings');
    }

    public function settings(Request $request)
    {
        $variables = $request->except('_token', '_method');
        setEnv($variables);
        notify()->success(__('notify/success.update'));

        return redirect(route('settings.edit'));
    }
}
