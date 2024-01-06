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
        $products = Product::get();
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
        $create = Product::create([
            'name' => $request->name,
            'url' => $request->url,
            'stage' => $request->stage,
            'logo' => $request->logo,
            'description' => $request->description,
        ]);
        if($create){
            return redirect()->route('product.index')->with(['success', 'Store Success!']);
        }
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
        $datum = Product::find($id);
        return view('features.product.partials.edit', compact('datum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreProductRequest $request, string $id)
    {
        $update = Product::find($id)->update([
            'name' => $request->name,
            'url' => $request->url,
            'stage' => $request->stage,
            'logo' => $request->logo,
            'description' => $request->description,
        ]);
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
