<?php

namespace App\Http\Controllers\Features\Release;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReleaseRequest;
use App\Models\Release;
use App\Models\Product;
use App\Models\Select;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $releases = Product::find(productId())->releases()->paginate(10);
        return view('features.release.index', compact('releases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.release.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReleaseRequest $request)
    {
        $data = $request->except('_token');
        $data['owner_id'] = ownerId();
        Release::create($data);

        notify()->success(__('Created successfully!'));
        return redirect()->route('release.index');

    }


    /**
     * Display the specified resource.
     */
    public function show(Release $release)
    {
        return view('features.release.partials.show', compact('release'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Release $release)
    {
        return view('features.release.partials.edit', compact('release'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Release $release)
    {
        $data = $request->except('_token', '_method');
        $data['owner_id'] = ownerId();
        $release->update($data);

        notify()->success(__('Updated successfully!'));
        return redirect()->route('release.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Release $release)
    {
        $release->delete();

        notify()->success(__('Deleted successfully!'));
        return redirect()->route('release.index');
    }
}
