<?php

namespace App\Http\Controllers\Features\Support;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = Support::where('owner_id', auth()->id())->limit(8)->get();
        return view('features.support.index', compact('supports'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.support.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Support::rules());
        $data = $request->except('_token');
        $data['owner_id'] = auth()->id();

        Support::create($data);

        notify()->success(__('Created successfully!'));
        return redirect()->route('support.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = base64_decode($id);
        $support = Support::find($id);
        if ($support == null) {
            notify()->success(__('Something went wrong!'));

            return redirect()->route('support.index');
        }

        return view('features.support.show', compact('support'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = base64_decode($id);

        $support = Support::find($id);

        if ($support == null) {
            notify()->success(__('Something went wrong!'));

            return redirect()->route('support.index');
        }

        return view('features.support.edit', compact('support'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(Support::rules());

        $id = base64_decode($id);

        $support = Support::find($id);

        if ($support == null) {
            notify()->success(__('Something went wrong!'));

            return redirect()->route('support.index');
        }
        $data = $request->except('_token');
        $data['owner_id'] = auth()->id();

        $support->update($data);

        notify()->success(__('Updated successfully!'));
        return redirect()->route('support.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = base64_decode($id);

        $support = Support::findOrFail($id);
        $support->delete();

        notify()->success(__('Deleted successfully!'));

        return redirect()->route('support.index');
    }
}
