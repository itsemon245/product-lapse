<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;
use App\Http\Requests\BankRequest;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bank = Bank::where('user_id', auth()->id())->first();
        return view('bank.create', compact('bank'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BankRequest $request)
    {
        $user = Bank::where('user_id', auth()->id())->first();
        if($user == null){
            Bank::create([
            'user_id' => auth()->id(),
            'bank_id' => $request->id,
            'name' => $request->name,
            'iban' => $request->iban,
            'payment_receipt' => $request->payment_receipt,
            ]);
        }else{
            $user->update([
            'bank_id' => $request->id,
            'name' => $request->name,
            'iban' => $request->iban,
            'payment_receipt' => $request->payment_receipt,
            ]);
        }
        return back();
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
}
