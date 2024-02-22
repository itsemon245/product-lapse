<?php

namespace App\Http\Controllers\Order;

use App\Models\Plan;
use App\Models\User;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use App\Enums\PaymentMethodEnum;
use App\Http\Controllers\Controller;

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
        $orderStatus = 'completed';
        $completedAt = now();
        $expireDate = now()->add($order->package->unit, $order->package->validity);
        $active     = true;
        if ($order->payment_method == PaymentMethodEnum::BANK_ACCOUNT->value) {
            $expireDate = null;
            $active     = false;
            $orderStatus = 'pending';
            $completedAt = null;
            session()->put('payment-message', __('Waiting for approval'));
        }

        if ($status == 'success') {
            $order->update([
                'status'       => $orderStatus,
                'completed_at' => $completedAt,
             ]);
            $activePlan = User::find(auth()->id())->activePlan();
            $activePlan->update([
                'active'=> 0,
                'expired_at'=> null
            ]);
            $plan = Plan::create([
                'order_id'      => $order->id,
                'user_id'       => $order->user_id,
                'name'          => $order->package->name,
                'price'         => $order->amount,
                'active'        => $active,
                'expired_at'    => $expireDate,
                'product_limit' => $order->package->product_limit,
             ]);
            return redirect(route('payment.success'));
        } else {

            $order->update([
                'status'    => 'failed',
                'failed_at' => now(),
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
