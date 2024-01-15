<?php

namespace App\Http\Controllers\Features\Idea;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Idea;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Idea::where('owner_id', auth()->user()->id)->get();
        return view('features.idea.index', compact('ideas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.idea.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Idea::rules());

        $data = $request->except('_token');
        $data['owner_id'] = auth()->user()->id;

        $idea = Idea::create($data);

        if (!$idea) {
            notify()->error(__('Created failed!'));
            return redirect()->route('idea.index');
        }

        notify()->success(__('Created successfully!'));
        return redirect()->route('idea.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = base64_decode($id);

        $idea = Idea::find($id);
        if ($idea->owner_id == auth()->user()->id) {
            return view('features.idea.partials.edit', compact('idea'));
        } else {
            notify()->error(__('Not authorized!'));
            return redirect()->route('idea.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(Idea::rules());

        $id = base64_decode($id);
        $idea = Idea::find($id);

        if (!$idea || $idea->owner_id != auth()->user()->id) {
            notify()->error(__('Not authorized!'));
            return redirect()->route('idea.index');
        }

        $data = $request->except('_token', '_method');
        $data['owner_id'] = auth()->user()->id;
        $idea->update($data);

        notify()->success(__('Updated successfully!'));
        return redirect()->route('idea.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = base64_decode($id);

        $idea = Idea::find($id);
        if ($idea->owner_id == auth()->user()->id) {
            $idea->delete();
            notify()->success(__('Deleted successfully!'));
            return redirect()->route('idea.index');
        } else {
            notify()->success(__('Delete failed!'));
            return redirect()->route('idea.index');
        }
    }
}
