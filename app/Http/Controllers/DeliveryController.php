<?php

namespace App\Http\Controllers;

use App\Models\Hello;
use Exception;
use App\Models\Delivery;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::where('owner_id', auth()->id())->get();

        return view('features.delivery.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.delivery.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Delivery::rules());

        $data = $request->except('_token', 'add_attachments');
        $data['owner_id'] = auth()->id();

        try {
            Delivery::create($data);

            notify()->success(__('Created successfully!'));

            return redirect()->route('delivery.index');
        } catch (Exception $e) {

            notify()->error(__('Create failed!'));
            return redirect()->route('delivery.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = base64_decode($id);
        $delivery = Delivery::find($id);

        if (!$delivery) {
            notify()->success(__('Not found!'));
            return redirect()->route('delivery.index');
        }

        return view('features.delivery.partials.show', compact('delivery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = base64_decode($id);
        $delivery = Delivery::find($id);

        if (!$delivery) {
            notify()->success(__('Not found!'));
            return redirect()->route('delivery.index');
        }

        return view('features.delivery.partials.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = base64_decode($id);
        $delivery = Delivery::find($id);

        if (!$delivery) {
            notify()->success(__('Not found!'));
            return redirect()->route('delivery.index');
        }

        $request->validate(Delivery::rules());

        $data = $request->except('_token', '_method', 'add_attachments');
        $data['owner_id'] = auth()->id();

        try {
            $delivery->update($data);
            notify()->success(__('Updated successfully!'));

            return redirect()->route('delivery.index');
        } catch (Exception $e) {
            notify()->error(__('Update failed!'));
            return redirect()->route('delivery.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = base64_decode($id);
        $delivery = Delivery::find($id);

        if (!$delivery) {
            notify()->success(__('Not found!'));
            return redirect()->route('delivery.index');
        }

        try {
            $delivery->delete();

            notify()->success(__('Deleted successfully!'));

            return redirect()->route('delivery.index');
        } catch (Exception $e) {

            notify()->error(__('Delete failed!'));
            return redirect()->route('delivery.index');
        }
    }
}