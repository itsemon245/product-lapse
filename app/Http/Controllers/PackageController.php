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
        // dd($request);
        $create = Package::create([
            'owner_id' => auth()->id(),
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
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $package = Package::find($id);
        return view('features.package.partials.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = Package::find($id);
        return view('features.package.partials.edit', compact('package'));
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
        if($find){
            return redirect()->route('package.index')->with(['success', 'Update Success!']);
        }
        return redirect()->route('package.index')->with(['error', 'Something Wrong!']);
        
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
