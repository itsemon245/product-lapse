<?php

namespace App\Http\Controllers\Order;

use App\Enums\PaymentMethodEnum;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function create(Package $package)
    {
        $order = Order::create([
            'package_id'=> $package->id,
            'uuid'=> uniqid('order-'),
        ]);

        return redirect()->route('order.selectMethod', ['order' => $order]);
    }

    public function selectMethod(Order $order)
    {
        $paymentMethods = array_column(PaymentMethodEnum::cases(), 'value');
        return view('order.create', compact('order', 'paymentMethods'));
    }
    public function store(Request $request, Order $order)
    {
        $paymentMethods = array_column(PaymentMethodEnum::cases(), 'value');
        if (!str($request->payment_method)->contains($paymentMethods)) {
            notify()->error('Invalid Payment Method!');
            return back();
        }
        $order->update([
            'payment_method'=>$request->payment_method
        ]);
        return view('order.create', compact('order', 'paymentMethods'));
    }
}
