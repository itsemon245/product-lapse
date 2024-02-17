<?php

namespace App\Http\Controllers\Features\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductHistoryRequest;
use App\Models\Product;
use App\Models\ProductHistory;
use Illuminate\Http\Request;

class ProductHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = ProductHistory::with('images')->where('product_id', productId())->get();
        return view('features.product.history.index', compact('histories'));
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
    public function store(ProductHistoryRequest $request)
    {
        try {
            $data = $request->except('_token', 'image');
            $data['product_id'] = productId();
            $product = ProductHistory::create($data);
            if ($request->hasFile('image')) {
                foreach ($request->file('image') as $image) {
                    $product->storeImage($image);
                }
            }

            notify()->success(__('notify/success.create'));

        } catch (\Exception $e) {
            \Log::error('Error creating ProductHistory: ' . $e->getMessage());

            // Notify the user about the error
            notify()->error(__('notify/error.create'));
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     */
    public function show(ProductHistory $productHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductHistory $productHistory)
    {
        return view('features.product.history.partials.edit', compact('productHistory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductHistory $productHistory)
    {
        $history = ProductHistory::with('images')->find($productHistory->id);

        if ($request->hasFile('image')) {
            if ($history->images->count() > 0) {
                foreach ($history->images as $image) {
                    $fileDeleted = $history->deleteImage($image);
                }
            }
            foreach ($request->file('image') as $image) {
                $history->storeImage($image);
            }
        }

        $history->date = $request->date;
        $history->description = $request->description;
        $history->save();

        notify()->success(__('notify/success.update'));

        return redirect()->route('product-history.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductHistory $productHistory)
    {
        $history = ProductHistory::with('images')->find($productHistory->id);

        if ($history->images->count() > 0) {
            $fileDeleted = $history->deleteImage($history->image);
        }

        $history->delete();
        notify()->success(__('notify/success.delete'));

        return redirect()->back();
    }
}
