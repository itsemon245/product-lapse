<?php

namespace App\Http\Controllers\Order;

use App\Enums\PaymentMethodEnum;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// use Paytabscom\Laravel_paytabs\paypage;

use Paytabscom\Laravel_paytabs\Facades\paypage;

class OrderController extends Controller
{
    public function create(Package $package)
    {
        $order = Order::create([
            'package_id' => $package->id,
            'user_id'    => auth()->id(),
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
            return redirect(route('bank.create', [ 'order' => $order ]));
        }

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
            ->shipping_same_billing(true)
            // ->sendHideShipping(false)
            ->sendURLs(config('paytabs.callback_url'), config('paytabs.ipn_url'))
            ->sendLanguage(app()->getLocale())
            ->create_pay_page(); // to initiate payment page

        return $pay;

    }
    public function index()
    {
        $orders = Order::with('user')->with('package')->paginate(15);
        return view('pages.order.management', compact('orders'));
    }

    public function approve(string $id)
    {
        
        $findOrder = Order::find($id);
        $findOrder->update([
            'status' => 'completed',
        ]);
    }

    public function show(String $id)
    {
        $findOrder = Order::with('user')->with('package')->find($id);
        $user = User::with('image')->where('id', $findOrder->user->id)->first();
        return view('pages.order.show', compact('findOrder', 'user'));
    }
}
