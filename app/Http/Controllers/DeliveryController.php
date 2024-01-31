<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeliveryRequest;
use App\Models\Product;
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
        $deliveries = Product::find(productId())->deliveries()->paginate(10);
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
    public function store(DeliveryRequest $request)
    {
        $data = $request->except('_token', 'add_attachments');
        $data['owner_id'] = ownerId();
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
    public function show(Delivery $delivery)
    {
        return view('features.delivery.partials.show', compact('delivery'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        return view('features.delivery.partials.edit', compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryRequest $request, Delivery $delivery)
    {

        $data = $request->except('_token', '_method', 'add_attachments');
        $data['owner_id'] = ownerId();

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
    public function destroy(Delivery $delivery)
    {
        $delivery->delete();
        notify()->success(__('Deleted successfully!'));
        return redirect()->route('delivery.index');
    }
}