<?php

namespace App\Http\Controllers\Features\Change;

use App\Models\Idea;
use App\Models\User;
use App\Models\Change;
use App\Models\Select;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangeRequest;
use App\Http\Requests\SearchRequest;

class ChangeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $changes = Product::find(productId())->changeManagements()->paginate(10);
        $statuses  = Select::of('change')->type('status')->get();
        return view('features.change.index', compact('changes', 'statuses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $idea = Idea::find(request()->query('idea'));
        $priorities = Select::of('change')->type('priority')->get();
        $statuses = Select::of('change')->type('status')->get();
        $classifications = Select::of('change')->type('classification')->get();
        return view('features.change.partials.create', compact('priorities', 'statuses', 'classifications', 'idea'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChangeRequest $request)
    {
        $data = $request->except('_token');
        $data['creator_id'] = ownerId();

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
    public function show(Change $change)
    {
        $user = User::with('image')->find($change->creator_id);
        $change->loadComments();
        $comments = $change->comments;
        return view('features.change.partials.show', compact('change', 'user', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Change $change)
    {
        $priorities = Select::of('change')->type('priority')->get();
        $statuses = Select::of('change')->type('status')->get();
        $classifications = Select::of('change')->type('classification')->get();

        return view('features.change.partials.edit', compact('change', 'priorities', 'statuses', 'classifications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChangeRequest $request, Change $change)
    {
        $data = $request->except('_token', '_method');
        $change->update($data);

        notify()->success(__('Update success!'));
        return redirect()->route('change.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Change $change)
    {
        $change->delete();

        notify()->success(__('Delete success!'));
        return redirect()->route('change.index');
    }
    public function search(SearchRequest $request)
    {
        $changes = SearchService::items($request);
        $statuses  = Select::of('change')->type('status')->get();
        return view('features.change.index', compact('changes', 'statuses'));
    }
}
