<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Models\Package;

class PackageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::get();
        return view('features.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.package.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageRequest $request)
    {
        $create = Package::create([
            'user_id' => 1,
            'name' => $request->name,
            'price' => $request->price,
            'monthly_rate' => $request->monthly_rate,
            'annual_rate' => $request->annual_rate,
            'subscription_type' => $request->subscription_type,
            'features' => $request->features,
            'product_limit' => $request->product_limit,
            'validity' => $request->validity,
            'has_limited_features' => $request->has_limited_features,
            'is_popular' => $request->is_popular,
        ]);
        return back()->with(['success', 'Add package!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $datum = Package::find($id);
        return view('features.package.partials.edit.show', compact('$datum'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $datum = Package::find($id);
        return view('features.package.partials.edit', compact('datum'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePackageRequest $request, string $id)
    {
        $find = Package::find($id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'monthly_rate' => $request->monthly_rate,
            'annual_rate' => $request->annual_rate,
            'subscription_type' => $request->subscription_type,
            'features' => $request->features,
            'product_limit' => $request->product_limit,
            'validity' => $request->validity,
            'has_limited_features' => $request->has_limited_features,
            'is_popular' => $request->is_popular,
        ]);
        return back()->with(['success', 'Update Success!']);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Package::destroy($id);
        return back()->with(['success', 'Delete Success!']);
    }
}
