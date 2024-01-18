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
        $products = Product::get();
        $features = [
            'innovate' => [
                'name' => 'Innovate',
                'counter' => 5,
                'icon' => 'img/solution.png',
                'route' => route('idea.index'),
            ],
            'product-planning' => [
                'name' => 'Product Planning',
                'counter' => 0,
                'icon' => 'img/plan.png',
                'route' => '#',
            ],
            'product-support' => [
                'name' => 'Product Support',
                'counter' => 0,
                'icon' => 'img/technical-support.png',
                'route' => route('support.index'),
            ],
            'change-management' => [
                'name' => 'Change Management',
                'counter' => 0,
                'icon' => 'img/cycle.png',
                'route' => route('change.index'),
            ],
            'product-documentation' => [
                'name' => 'Product Documentation',
                'counter' => 0,
                'icon' => 'img/checklist.png',
                'route' => route('document.index'),
            ],
            'product-team' => [
                'name' => 'Product Team',
                'counter' => 0,
                'icon' => 'img/help.png',
                'route' => '#',
            ],
            'product-reporting' => [
                'name' => 'Product Reporting',
                'counter' => 0,
                'icon' => 'img/dashboard.png',
                'route' => route('report.index'),
            ],
            'product-info' => [
                'name' => 'Product Info',
                'counter' => 0,
                'icon' => 'img/website.png',
                'route' => '#',
            ],
            'product-history' => [
                'name' => 'Product History',
                'counter' => 0,
                'icon' => 'img/bank-account.png',
                'route' => '#'
            ],
            'historical-images' => [
                'name' => 'Historical Images',
                'counter' => 0,
                'icon' => 'img/photo.png',
                'route' => '#'
            ],
            'product-delivery' => [
                'name' => 'Product Delivery',
                'counter' => 0,
                'icon' => 'img/delivered.png',
                'route' => route('delivery.index'),
            ],
        ];
        return view('features.product.home', compact('product', 'features', 'products'));
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
