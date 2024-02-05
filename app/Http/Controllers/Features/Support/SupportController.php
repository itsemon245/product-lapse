<?php

namespace App\Http\Controllers\Features\Support;

use App\Http\Requests\SupportRequest;
use App\Models\Support;
use App\Models\Product;
use App\Models\Select;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = Product::find(productId())->supports;
        return view('features.support.index', compact('supports'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priorities = Select::of('support')->type('priority')->get();
        $statuses = Select::of('support')->type('status')->get();
        $classifications = Select::of('support')->type('classification')->get();

        return view('features.support.partials.create', compact('priorities', 'statuses', 'classifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupportRequest $request)
    {
        $data = $request->except('_token');
        $data['owner_id'] = auth()->id();

        Support::create($data);

        notify()->success(__('Created successfully!'));
        return redirect()->route('support.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        return view('features.support.partials.show', compact('support'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support)
    {
        $priorities = Select::of('support')->type('priority')->get();
        $statuses = Select::of('support')->type('status')->get();
        $classifications = Select::of('support')->type('classification')->get();

        return view('features.support.partials.edit', compact('support', 'priorities', 'statuses', 'classifications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupportRequest $request, Support $support)
    {
        $data = $request->except('_token');
        $data['owner_id'] = ownerId();

        $support->update($data);

        notify()->success(__('Updated successfully!'));
        return redirect()->route('support.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Support $support)
    {

        $support->delete();

        notify()->success(__('Deleted successfully!'));
        return redirect()->route('support.index');
    }

    public function search(SearchRequest $request)
    {
        $supports = SearchService::items($request);
        return view('features.support.index', compact('supports'));
    }
}
