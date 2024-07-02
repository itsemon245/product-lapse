<?php

namespace App\Http\Controllers\Order;

use App\Enums\PaymentMethodEnum;
use App\Http\Controllers\Controller;
use App\Mail\InvoiceMail;
use App\Models\Order;
use App\Models\Plan;
use App\Models\User;
use App\Services\SelectService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PaymentController extends Controller
{
    public function ipn(Request $request)
    {
        $orderUuid = $request->cartId;
        $status = $request->respStatus;
        $order = Order::where('uuid', $orderUuid)->with('package')->first();

        if ($status == 'A') {
            $orderStatus = 'completed';
            $active = true;
            $completedAt = now();
            $expireDate = now()->add($order->package->unit, $order->package->validity);
            $order = tap($order)->update([
                'status' => $orderStatus,
                'completed_at' => $completedAt,
            ]);
            $activePlan = User::find(auth()->id())->activePlan();
            $activePlan->update([
                'active' => 0,
                'expired_at' => null,
            ]);
            $plan = Plan::create([
                'order_id' => $order->id,
                'package_id' => $order->package_id,
                'user_id' => $order->user_id,
                'name' => $order->package->name,
                'price' => $order->amount,
                'active' => $active,
                'expired_at' => $expireDate,
                'product_limit' => $order->package->product_limit,
            ]);
            Mail::to($order->user->billingAddress->email)->send(new InvoiceMail($order));

            return redirect(route('payment.success'));
        } else {

            $order->update([
                'status' => 'failed',
                'failed_at' => now(),
            ]);

            return redirect(route('payment.failed'));
        }

    }

    public function callback(Request $request)
    {
        $orderUuid = $request->cartId ?? $request->cart_id;
        if (! $orderUuid) {
            notify()->success(trans('Order Cancelled!'));

            return redirect('/');
        }
        $order = Order::where('uuid', $orderUuid)->with('package')->first();
        $user = transferInformationIfMember($order);
        SelectService::createDefaults($user);
        if ($order->payment_method == PaymentMethodEnum::BANK_ACCOUNT->value) {
            $expireDate = null;
            $active = false;
            $orderStatus = 'pending';
            $completedAt = null;
            session()->flash('payment-message', __('Waiting for approval'));
            $plan = Plan::create([
                'order_id' => $order->id,
                'package_id' => $order->package_id,
                'user_id' => $user->id,
                'name' => $order->package->name,
                'price' => $order->amount,
                'active' => $active,
                'expired_at' => $expireDate,
                'product_limit' => $order->package->product_limit,
            ]);
            Mail::to($order->user->billingAddress()->email)->send(new InvoiceMail($order));

            return redirect(route('payment.success'));
        }
        $status = $request->respStatus;
        $orderStatus = 'completed';
        $completedAt = now();
        $expireDate = now()->add($order->package->unit, $order->package->validity);
        $active = true;

        if ($status == 'A') {
            $order = tap($order)->update([
                'status' => $orderStatus,
                'completed_at' => $completedAt,
            ]);
            $activePlan = User::find($order->user_id)->activePlan()->first();
            if ($activePlan) {
                $activePlan->update([
                    'active' => 0,
                    'expired_at' => null,
                ]);
            }
            $plan = Plan::create([
                'order_id' => $order->id,
                'user_id' => $user->id,
                'package_id' => $order->package_id,
                'name' => $order->package->name,
                'price' => $order->amount,
                'active' => $active,
                'expired_at' => $expireDate,
                'product_limit' => $order->package->product_limit,
            ]);
            Mail::to($order->user->billingAddress()->email)->send(new InvoiceMail($order));
            session()->flash('payment-message', __('Payment Success'));

            return redirect(route('payment.success'));
        } else {

            $order->update([
                'status' => 'failed',
                'failed_at' => now(),
            ]);
            session()->flash('payment-message', __('Payment Failed!'));

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
