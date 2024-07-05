<?php

namespace App\Http\Controllers;

use App\Enums\PaymentMethodEnum;
use App\Http\Requests\BankRequest;
use App\Models\Bank;
use App\Models\CreditCard;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Order $order)
    {
        $bank = Bank::where('user_id', auth()->id())->first();

        return view('bank.create', compact('bank', 'order'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankRequest $request, Order $order)
    {
        $bankDetails = $request->validated();
        $file = $request->file('attachment');
        $path = 'uploads/orders/attachments';
        $name = uuid_create(UUID_TYPE_TIME).'.'.$file->extension();
        $bankDetails['attachment'] = $file->storePubliclyAs($path, $name, 'public');
        // $bank = Bank::where('user_id', auth()->id())->first();
        // if ($bank == null) {
        //     $bank = Bank::create([
        //         'user_id' => auth()->id(),
        //         'account_id' => $request->id,
        //         'name' => $request->name,
        //         'iban' => $request->iban,
        //         'payment_receipt' => $request->boolean('payment_receipt'),
        //     ]);
        // } else {
        //     $bank = tap($bank)->update([
        //         'account_id' => $request->id,
        //         'name' => $request->name,
        //         'iban' => $request->iban,
        //         'payment_receipt' => $request->boolean('payment_receipt'),
        //     ]);
        // }

        $order = tap($order)->update([
            'bank_details' => $bankDetails,
            'payment_method' => PaymentMethodEnum::BANK_ACCOUNT->value,
            'status' => 'pending',
        ]);

        $param = "?cart_id=$order->uuid";

        $url = config('paytabs.callback_url').$param;

        // dd($url);
        return redirect($url);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BankRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function creditCard()
    {
        $data = CreditCard::where('user_id', auth()->id())->first();

        return view('bank.credit.create', compact('data'));
    }

    public function creditCardStore(BankRequest $request)
    {
        $user = CreditCard::where('user_id', auth()->id())->first();
        if ($user == null) {
            CreditCard::create([
                'user_id' => auth()->id(),
                'number' => $request->number,
                'name' => $request->name,
                'expiry_date' => $request->expiry_date,
                'cvv' => $request->cvv,
            ]);
        } else {
            $user->update([
                'number' => $request->number,
                'name' => $request->name,
                'expiry_date' => $request->expiry_date,
                'cvv' => $request->cvv,
            ]);
        }

        return back();
    }
}
