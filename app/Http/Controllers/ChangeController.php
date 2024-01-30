<?php

namespace App\Http\Controllers;

use App\Models\Change;
use App\Models\Select;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Requests\SearchRequest;

class ChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $changes = Change::where('owner_id', auth()->id())->limit(8)->get();
        return view('features.change.index', compact('changes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priority = Select::of('change')->type('priority')->get();
        $status = Select::of('change')->type('status')->get();
        $classification = Select::of('change')->type('classification')->get();
        return view('features.change.partials.create', compact('priority', 'status', 'classification'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Change::rules());
        $data = $request->except('_token');
        $data['owner_id'] = auth()->id();

        $change = Change::create($data);

        if (!$change) {
            notify()->success(__('Create failed!'));
            return redirect()->route('change.index');
        }

        notify()->success(__('Created successfully!'));
        return redirect()->route('change.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $id = base64_decode($id);
        $change = Change::find($id);

        if (!$change) {
            notify()->success(__('Not found!'));
            return redirect()->route('change.index');
        }

        return view('features.change.partials.show', compact('change'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = base64_decode($id);
        $change = Change::find($id);

        $priority = Select::of('change')->type('priority')->get();
        $status = Select::of('change')->type('status')->get();
        $classification = Select::of('change')->type('classification')->get();

        if (!$change) {
            notify()->success(__('Not found!'));
            return redirect()->route('change.index');
        }

        return view('features.change.partials.edit', compact('change', 'priority', 'status', 'classification'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $id = base64_decode($id);
        $change = Change::find($id);

        if (!$change) {
            notify()->success(__('Not found!'));
            return redirect()->route('change.index');
        }

        $request->validate(Change::rules());
        $data = $request->except('_token', '_method');
        $data['owner_id'] = auth()->id();

        $change->update($data);

        if (!$change) {
            notify()->success(__('Update failed!'));
            return redirect()->route('change.index');
        }

        notify()->success(__('Update success!'));
        return redirect()->route('change.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = base64_decode($id);
        $change = Change::where('owner_id', auth()->id())->find($id);

        if (!$change) {
            notify()->success(__('Not found!'));
            return redirect()->route('change.index');
        }

        $change->delete();

        if (!$change) {
            notify()->success(__('Delete failed!'));
            return redirect()->route('change.index');
        }

        notify()->success(__('Delete success!'));
        return redirect()->route('change.index');
    }
    public function search(SearchRequest $request)
    {
        $changes = SearchService::items($request);
        return view('features.change.index', compact('changes'));
    }
}
