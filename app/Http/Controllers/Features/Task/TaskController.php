<?php

namespace App\Http\Controllers\Features\Task;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('owner_id', auth()->user()->id)->get();
        return view('features.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $request->validate(Task::rules());

        $task = Task::create([
            'owner_id' => auth()->user()->id,
            'name' => $request->name,
            'category' => $request->category,
            'status' => $request->status,
            'choose_mvp' => $request->has('choose_mvp'), // Use has() to check if the checkbox is checked
            'details' => $request->details,
            'steps' => $request->steps,
            'starting_date' => $request->starting_date,
            'ending_date' => $request->ending_date,
            'administrator' => $request->administrator,
        ]);

        if ($request->has('add_attachments')) {
            $task->storeFile($request->add_attachments);
        }

        return redirect()->route('task.index')->with('success', 'Task Created Successfully.');
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

        $task = Task::find($id);
        if ($task->owner_id == auth()->user()->id) {
            return view('features.task.edit', compact('task'));
        } else {
            return redirect()->route('task.index')->with('success', 'You are not authorized to edit this idea.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(Task::rules());

        $id = base64_decode($id);

        $task = Task::find($id);

        if (!$task || $task->owner_id != auth()->user()->id) {
            return redirect()->route('idea.index')->with('success', 'Something went wrong.');
        }
        if ($request->has('add_attachments')) {
            $file = $task->updateFile($request->add_attachments, $task->add_attachments);
        }

        $task->update([
            'owner_id' => auth()->user()->id,
            'name' => $request->name,
            'category' => $request->category,
            'status' => $request->status,
            'choose_mvp' => $request->has('choose_mvp'), // Use has() to check if the checkbox is checked
            'details' => $request->details,
            'steps' => $request->steps,
            'starting_date' => $request->starting_date,
            'ending_date' => $request->ending_date,
            'administrator' => $request->administrator,
        ]);

        if ($request->has('add_attachments')) {
            $task->storeFile($request->add_attachments);
        }

        return redirect()->route('task.index')->with('success', 'Task Created Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = base64_decode($id);

        $task = Task::find($id);
        if ($task->owner_id == auth()->user()->id) {

            $task->delete();
            return redirect()->route('task.index')->with('success', 'Idea deleted successfully.');
        } else {
            return redirect()->route('task.index')->with('error', 'You are not authorized to delete this idea.');
        }
    }
}
