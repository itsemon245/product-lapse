<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\StoreProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('features.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.product.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        // dd($request->logo);
        $product = Product::create([
            'owner_id' => auth()->id(),
            'name' => $request->name,
            'url' => $request->url,
            'stage' => $request->stage,
            'description' => $request->description,
        ]);
        $image = $product->storeImage($request->logo);
        notify()->success(__('notify/success.create'));
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);
        return view('features.product.home', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        return view('features.product.partials.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, Product $product)
    {
        $product->update([
            'name' => $request->name,
            'url' => $request->url,
            'stage' => $request->stage,
            'description' => $request->description,
        ]);
        $image = $product->updateImage($request->logo, $product->image);
        notify()->success(__('notify/success.update'));
        return redirect()->route('product.index')->with(['success', 'Update Success!']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Product::destroy($id);
        return back()->with(['success', 'Delete Success!']);
    }
}
