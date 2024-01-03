<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::get();
        return view('pages.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageRequest $request)
    {
        // dd($request);auth()->id()
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
        return back()->with(['success', 'Store Success!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $packages = Package::get();
        // return view('pages.packages.show', compact('packages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Package::find($id);
        return view('pages.packages.create', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePackageRequest $request, string $id)
    {
        // $find = Package::find($id);

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
        // dd
        $data = Package::destroy($id);
        return back();
    }
}
