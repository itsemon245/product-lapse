<?php

namespace App\Http\Controllers\Order;

use App\Enums\PaymentMethodEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class OrderController extends Controller
{
    public function create(Package $package)
    {
        $order = Order::create([
            'package_id' => $package->id,
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
            ->sendCustomerDetails($name, $email, $phone, $street1, $city, $state, $country, $zip, $ip)
            ->sendShippingDetails($same_as_billing, $name = null, $email = null, $phone = null, $street1 = null, $city = null, $state = null, $country = null, $zip = null, $ip = null)
            ->sendHideShipping($on = false)
            ->sendURLs($return, $callback)
            ->sendLanguage(app()->getLocale())
            ->create_pay_page(); // to initiate payment page
        return view('order.create', compact('order', 'paymentMethods'));
    }
}
