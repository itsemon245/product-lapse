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
        $supports = Product::find(productId())->supports()->paginate(10);
        $statuses = Select::of('support')->type('status')->get();
        return view('features.support.index', compact('supports', 'statuses'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priorities = Select::of('support')->type('priority')->get();
        $statuses = Select::of('support')->type('status')->get();
        $classifications = Select::of('support')->type('classification')->get();

        $users = Product::find(productId())->users;

        return view('features.support.partials.create', compact('priorities', 'statuses', 'classifications', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SupportRequest $request)
    {
        $data = $request->except('_token');
        

        Support::create($data);

        notify()->success(__('Created successfully!'));
        return redirect()->route('support.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Support $support)
    {
        $creator = User::where('id', $support->creator_id)->with('image')->first();
        $support->loadComments();
        $comments = $support->comments;
        $statuses = Select::of('support')->type('status')->get();

        return view('features.support.partials.show', compact('creator', 'support', 'comments', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Support $support)
    {
        $priorities = Select::of('support')->type('priority')->get();
        $statuses = Select::of('support')->type('status')->get();
        $classifications = Select::of('support')->type('classification')->get();

        $users = Product::find(productId())->users;

        return view('features.support.partials.edit', compact('support', 'priorities', 'statuses', 'classifications', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SupportRequest $request, Support $support)
    {
        $data = $request->except('_token');
        

        $support->update($data);

        notify()->success(__('Updated successfully!'));
        return redirect()->route('support.index');
    }

    public function updateStatus(Request $request, Support $support)
    {
        $support->update(['status' => $request->status]);

        notify()->success(__('Updated successfully!'));
        return redirect()->route('support.show', $support);
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
