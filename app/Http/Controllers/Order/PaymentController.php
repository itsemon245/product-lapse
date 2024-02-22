<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use App\Models\Plan;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function ipn(Request $request)
    {
        
    }

    public function callback(Request $request)
    {
        $status    = $request->status;
        $orderUuid = $request->order_id;

        $order      = Order::where('uuid', $orderUuid)->with('package')->first();
        $expireDate = now()->add($order->package->unit, $order->package->validity);

        if ($status == 'success') {
            $order->update([
                'status'       => 'completed',
                'completed_at' => now(),
             ]);

            $plan = Plan::create([
                'order_id'      => $order->id,
                'user_id'       => $order->user_id,
                'name'          => $order->package->name,
                'price'         => $order->amount,
                'active'        => true,
                'expired_at'    => $expireDate,
                'product_limit' => $order->package->product_limit,
             ]);
            return redirect(route('payment.success'));
        } else {

            $order->update([
                'status' => 'failed',
                'failed_at' => now()
            ]);
            return redirect(route('payment.failed'));
        }

    }

    public function success(Request $request)
    {

        notify()->success(__('Payment Successful!'));

        return view('order.payment.success');
    }

    public function failed(Request $request)
    {

        notify()->error(__('Payment Failed!'));
        return view('order.payment.failed');

    }
}
