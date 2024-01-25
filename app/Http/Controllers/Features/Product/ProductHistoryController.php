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
        return view('features.product.history.index');
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
            $data['product_id'] = $request->id;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProductHistory $productHistory)
    {
        notify()->success(__('notify/success.update'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductHistory $productHistory)
    {
        notify()->success(__('notify/success.delete'));
    }
}
