<?php

namespace App\Http\Controllers\Package;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Models\PackageFeature;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PackageFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $packageFeatures = PackageFeature::latest()->paginate();
        return view('admin.package-feature.index', compact('packageFeatures'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PackageFeature::create([
            'name' => $request->name,
         ]);
        notify()->success(__('notify/success.create'));
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PackageFeature $packageFeature)
    {
        $packageFeature->update([
            'name' => $request->name,
         ]);
        notify()->success(__('notify/success.update'));
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackageFeature $packageFeature)
    {
        $packageFeature->delete();
        notify()->success(__('notify/success.delete'));
        return back();
    }

    public function search(SearchRequest $request)
    {
        $search          = $request->search;
        $packageFeatures = PackageFeature::where(function (Builder $q) use ($search) {
            $q->where('name', 'like', "%" . $search . "%");
        })->latest()->paginate();
        return view('admin.package-feature.index', compact('packageFeatures'));
    }
}
