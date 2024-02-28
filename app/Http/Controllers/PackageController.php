<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Feature;
use App\Models\Package;
use App\Models\PackageFeature;
use App\Models\Select;

class PackageController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packages = Package::with('activeFeatures')->get();
        return view('pages.package.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $features = PackageFeature::latest()->paginate();
        return view('pages.package.partials.create', compact('features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PackageRequest $request)
    {
        $package = Package::create([
            'name'            => $request->validated('name'),
            'price'           => $request->validated('price'),
            'product_limit'   => $request->validated('product_limit'),
            'validity'        => $request->validated('validity'),
            'unit'            => $request->validated('unit'),
            'is_popular'      => $request->boolean('is_popular'),
            'limited_feature' => $request->boolean('limited_feature'),
         ]);
        $packageFeatures = PackageFeature::latest()->get();
        foreach ($packageFeatures as $feature) {
            $package->features()->attach($feature->id);
        }

        foreach ($request->features as $feature) {
            # code...
            if ($feature) {
                $package->features()->updateExistingPivot($feature, [ 'is_on' => true ]);
            }
        }
        notify()->success('New Package Added Successfully!');
        return redirect()->route('package.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $package = Package::find($id);
        if (!$package) {
            return redirect()->back();
        }
        return view('pages.package.partials.show', compact('package'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = Package::find($id);
        if (!$package) {
            return redirect()->back();
        }
        $type = Select::of('package')->type('type')->get();
        $features = PackageFeature::latest()->get();
        return view('pages.package.partials.edit', compact('package', 'type', 'features'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PackageRequest $request, Package $package)
    {

        $package = tap($package)->update([
            'name'            => $request->validated('name'),
            'price'           => $request->validated('price'),
            'product_limit'   => $request->validated('product_limit'),
            'validity'        => $request->validated('validity'),
            'unit'            => $request->validated('unit'),
            'is_popular'      => $request->boolean('is_popular'),
            'limited_feature' => $request->boolean('limited_feature'),
         ]);
        $packageFeatures = PackageFeature::latest()->get();
        foreach ($packageFeatures as $feature) {
            $package->features()->attach($feature->id);
        }
        $package->features()->delete();
        foreach ($request->features as $feature) {
            # code...
            if ($feature) {
                $package->features()->updateExistingPivot($feature, [ 'is_on' => true ]);
            }
        }
        notify()->success(__('Updated successfully!'));
        return redirect(route('package.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Package::destroy($id);
        return back()->with([ 'success', 'Delete Success!' ]);
    }

    public function createInput()
    {
        return view('pages.package.partials.input');
    }

    public function compare()
    {
        $packages        = Package::get();
        $packageFeatures = PackageFeature::get();
        return view('packages.compare', compact('packages', 'packageFeatures'));
    }
}
