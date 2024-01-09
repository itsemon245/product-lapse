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
        return view('features.idea.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(Idea::rules());

        Idea::create([
            'owner_id' => auth()->user()->id,
            'name' => $request->input('name'),
            'owner' => $request->input('owner'),
            'priority' => $request->input('priority'),
            'details' => $request->input('details'),
            'requirements' => $request->input('requirements'),
        ]);

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
            return view('features.idea.edit', compact('idea'));
        } else {
            return redirect()->route('idea.index')->with('success', 'You are not authorized to edit this idea.');
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
            return redirect()->route('idea.index')->with('success', 'Something went wrong.');
        }

        $idea->update([
            'name' => $request->input('name'),
            'owner' => $request->input('owner'),
            'priority' => $request->input('priority'),
            'details' => $request->input('details'),
            'requirements' => $request->input('requirements'),
        ]);

        return redirect()->route('idea.index')->with('success', 'Idea updated successfully');
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
            return redirect()->route('idea.index')->with('success', 'Idea deleted successfully.');
        } else {
            return redirect()->route('idea.index')->with('error', 'You are not authorized to delete this idea.');
        }
    }
}
