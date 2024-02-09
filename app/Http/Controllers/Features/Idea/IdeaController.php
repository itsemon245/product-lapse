<?php

namespace App\Http\Controllers\Features\Idea;

use App\Models\Idea;
use App\Models\Select;
use App\Models\Product;
use App\Notifications\IdeaNotification;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Requests\IdeaRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Cookie;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Product::find(productId())->ideas()->paginate(10);
        $priorities = Select::of('idea')->type('priority')->get();
        return view('features.idea.index', compact('ideas', 'priorities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priorities = Select::of('idea')->type('priority')->get();

        return view('features.idea.partials.create', compact('priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdeaRequest $request)
    {
        $data = $request->except('_token');
        $data['owner_id'] = ownerId();
        $idea = Idea::create($data);
        $request->session()->flash(
            'massage', 'Store success'
        );
        notify()->success(__('Created successfully!'));
        return redirect()->route('idea.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        $idea->load(['comments', 'comments.user', 'comments.replies']);
        $comments = $idea->comments;
        return view('features.idea.partials.show', compact('idea', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        $priorities = Select::of('idea')->type('priority')->get();

        return view('features.idea.partials.edit', compact('idea', 'priorities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdeaRequest $request, Idea $idea)
    {
        $data = $request->except('_token', '_method');
        $data['owner_id'] = ownerId();
        $idea->update($data);

        notify()->success(__('Updated successfully!'));
        return redirect()->route('idea.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();
        notify()->success(__('Deleted successfully!'));
        return redirect()->route('idea.index');
    }

    public function search(SearchRequest $request)
    {
        $ideas = SearchService::items($request);
        $priorities = Select::of('idea')->type('priority')->get();
        return view('features.idea.index', compact('ideas', 'priorities'));
    }


    public function notify(){
        $idea = Idea::first();
        auth()->user()->notify(new IdeaNotification($idea));
    }
}
