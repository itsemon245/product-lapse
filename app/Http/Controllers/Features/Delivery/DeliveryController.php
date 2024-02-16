<?php

namespace App\Http\Controllers\Features\Delivery;

use Exception;

use App\Models\User;
use App\Models\Hello;
use App\Models\Product;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\DeliveryRequest;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Product::find(productId())->deliveries()->paginate();
        return view('features.delivery.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        return view('features.delivery.partials.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryRequest $request)
    {
        $data = $request->except('_token', 'add_attachments');
        $data['creator_id'] = ownerId();
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
        $creator= User::with('image')->find($delivery->creator_id);
        $delivery->loadComments();
        $comments = $delivery->comments;
        return view('features.delivery.partials.show', compact('delivery', 'creator', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        $users = User::get();
        return view('features.delivery.partials.edit', compact('delivery', 'users'));
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

    public function search(SearchRequest $request)
    {
        $deliveries = SearchService::items($request);
        return view('features.delivery.index', compact('deliveries'));
    }
}