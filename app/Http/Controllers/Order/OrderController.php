<?php

namespace App\Http\Controllers\Order;

use App\Models\Plan;
use App\Models\User;
use App\Models\Order;
use App\Models\Select;
use App\Models\Package;
use App\Mail\InvoiceMail;
use Illuminate\Support\Str;
// use Paytabscom\Laravel_paytabs\paypage;

use Illuminate\Http\Request;
use App\Enums\OrderStatusEnum;
use App\Services\SearchService;
use App\Enums\PaymentMethodEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Mail;
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
        if ($package->price < 1) {
            return redirect()->route('order.free', $order);
        }

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

        $address        = User::find(auth()->id())->billingAddress();
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
        $options = OrderStatusEnum::cases();
        $orders = Order::whereNot('status', 'draft')->with('package', 'user')->latest()->paginate();
        return view('pages.order.management', compact('orders', 'options'));
    }

    public function approve(int $id)
    {

        $order = Order::find($id);
        $order = tap($order)->update([
            'status'       => 'completed',
            'completed_at' => now(),
         ]);
        $activePlan = User::find($order->user_id)->activePlan()->first();
        if ($activePlan) {
            $activePlan->update([
                'active'     => 0,
                'expired_at' => null,
             ]);
        }
        $expireDate = now()->add($order->package->unit, $order->package->validity);
        $plan       = Plan::create([
            'order_id'      => $order->id,
            'user_id'       => $order->user_id,
            'name'          => $order->package->name,
            'price'         => $order->amount,
            'active'        => true,
            'expired_at'    => $expireDate,
            'product_limit' => $order->package->product_limit,
         ]);
        Mail::to($order->user->billingAddress()->email)->send(new InvoiceMail($order));

        notify()->success(__('Order approved!'));
        return back();
    }

    public function show(String $id)
    {
        $findOrder = Order::with('user', 'package',)->find($id);
        // $billingaddress = User::find($findOrder->user->id)->billingaddress();
        return view('pages.order.show', compact('findOrder'));
    }


    public function freePackage(Order $order)
    {
        $expireDate  = now()->add($order->package->unit, $order->package->validity);
        $activePlan = User::find($order->user_id)->activePlan()->first();
        if ($activePlan) {
            $activePlan->update([
                'active'     => 0,
                'expired_at' => null,
             ]);
        }
        $plan = Plan::create([
            'order_id'      => $order->id,
            'user_id'       => $order->user_id,
            'name'          => $order->package->name,
            'price'         => $order->amount,
            'active'        => true,
            'expired_at'    => $expireDate,
            'product_limit' => $order->package->product_limit,
         ]);
         $order = tap($order)->update([
            'status'       => 'completed',
            'completed_at' => now(),
         ]);
        Mail::to($order->user->billingAddress()->email)->send(new InvoiceMail($order));

        return redirect(route('payment.success'));
    }
    public function search(Request $request)
    {
        
        $options = OrderStatusEnum::cases();
        $orders = Order::where(function($q) use ($request) {
            if($request->search){
                $q->where('status', strtolower($request->search));
            }
        })->with('package', 'user')->latest()->paginate();
        return view('pages.order.management', compact('options', 'orders'));
    }
}
