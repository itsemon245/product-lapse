<?php

namespace App\Http\Controllers\Order;

use App\Models\User;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Enums\PaymentMethodEnum;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class OrderController extends Controller
{
    public function create(Package $package)
    {
        $order = Order::create([
            'package_id' => $package->id,
            'user_id' => auth()->id(),
            'uuid'       => uniqid('order-'),
            'amount'     => round($package->price, 2),
         ]);

        return redirect()->route('order.selectMethod', [ 'order' => $order ]);
    }

    public function selectMethod(Order $order)
    {
        $paymentMethods = array_column(PaymentMethodEnum::cases(), 'value');
        return view('order.create', compact('order', 'paymentMethods'));
    }
    public function store(Request $request, Order $order)
    {
        if ($request->payment_method == PaymentMethodEnum::BANK_ACCOUNT->value) {
            return redirect(route('bank.create', ['order'=> $order]));
        }
        DB::transaction(function () use ($order, $request) {

            $address        = User::find(auth()->id())->shippingAddress();
            $paymentMethods = array_column(PaymentMethodEnum::cases(), 'value');
            if (!str($request->payment_method)->contains($paymentMethods)) {
                notify()->error('Invalid Payment Method!');
                return back();
            }
            $order = tap($order)->update([
                'payment_method' => $request->payment_method,
             ]);
            $method = Str::replace(" ", "", $order->payment_method);
            $pay    = paypage::sendPaymentCode($method)
                ->sendTransaction('sale', 'ecom')
                ->sendCart($order->uuid, $order->amount, 'Test Order')
                ->sendCustomerDetails($address->name, $address->email, $address->phone, $address->street, $address->city, $address->state, $address->country, $address->zip, $address->ip)
                ->sendHideShipping($on = false)
                ->sendURLs(config('paytabs.callback_url'), config('paytabs.ipn_url'))
                ->sendLanguage(app()->getLocale())
                ->create_pay_page(); // to initiate payment page 
        });
        $param = "?status=success&order_id=$order->uuid";
        $url   = config('paytabs.callback_url') . $param;
        return redirect($url);

    }
}
