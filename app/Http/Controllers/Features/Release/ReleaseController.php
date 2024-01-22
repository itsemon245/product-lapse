<?php

namespace App\Http\Controllers\Features\Release;

use App\Http\Controllers\Controller;
use App\Models\Release;
use App\Models\Select;
use Illuminate\Http\Request;

class ReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $releases = Release::where('owner_id', auth()->user()->id)->get();
        return view('features.release.index', compact('releases'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = Select::of('release')->type('type')->get();
        return view('features.release.partials.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(Release::rules());

        $data = $request->except('_token');
        $data['owner_id'] = auth()->user()->id;
        Release::create($data);

        notify()->success(__('Created successfully!'));
        return redirect()->route('release.index');

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = base64_decode($id);
        $release = Release::where('owner_id', auth()->id())->find($id);

        if (!$release)
            return redirect()->route('release.index');

        return view('features.release.partials.show', compact('release'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = base64_decode($id);

        $type = Select::of('release')->type('type')->get();

        $release = Release::where('owner_id', auth()->id())->find($id);

        if (!$release)
            return redirect()->route('release.index');

        return view('features.release.partials.edit', compact('release', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(Release::rules());
        $id = base64_decode($id);
        $release = Release::where('owner_id', auth()->id())->find($id);

        if (!$release)
            return redirect()->route('release.index');

        $data = $request->except('_token', '_method');
        $data['owner_id'] = auth()->id();
        $release->update($data);

        notify()->success(__('Updated successfully!'));
        return redirect()->route('release.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = base64_decode($id);
        $release = Release::where('owner_id', auth()->id())->find($id);

        if (!$release)
            return redirect()->route('release.index');

        $release->delete();

        notify()->success(__('Deleted successfully!'));
        return redirect()->route('release.index');
    }
}
