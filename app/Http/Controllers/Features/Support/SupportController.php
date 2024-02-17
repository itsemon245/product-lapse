<?php

namespace App\Http\Controllers\Features\Support;

use App\Models\User;
use App\Models\Select;
use App\Models\Product;
use App\Models\Support;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\SupportRequest;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $supports = Product::find(productId())->supports;
        $statuses = Select::of('support')->type('ticket')->get();
        return view('features.support.index', compact('supports', 'statuses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priorities = Select::of('support')->type('priority')->get();
        $statuses = Select::of('support')->type('ticket')->get();
        $classifications = Select::of('support')->type('classification')->get();

        return view('features.support.partials.create', compact('priorities', 'statuses', 'classifications'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupportRequest $request)
    {
        $data = $request->except('_token');
        $data['creator_id'] = auth()->id();

        Support::create($data);

        notify()->success(__('Created successfully!'));
        return redirect()->route('support.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        $user = User::with('image')->find($support->creator_id);
        $support->loadComments();
        $comments = $support->comments;
        // dd($user);
        return view('features.support.partials.show', compact('user', 'support', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support)
    {
        $priorities = Select::of('support')->type('priority')->get();
        $statuses = Select::of('support')->type('ticket')->get();
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
        $statuses = Select::of('support')->type('ticket')->get();
        return view('features.support.index', compact('supports', 'statuses'));
    }
}
