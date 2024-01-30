<?php

namespace App\Http\Controllers\Features\Task;

use App\Models\Task;
use App\Models\Select;
use App\Services\SearchService;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('owner_id', auth()->id())->get();
        return view('features.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Select::of('task')->type('category')->get();
        $status = Select::of('task')->type('status')->get();

        return view('features.task.create', compact('category', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(TaskRequest $request)
    {
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
        notify()->success(__('Created Successfully!'));
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {

        if ($task->owner_id == auth()->user()->id) {
            return view('features.task.show', compact('task'));
        } else {
            return redirect()->route('task.index')->with('success', 'You are not authorized to view this idea.');
        }
    }

    public function changeStatus(TaskRequest $request, Task $task)
    {
        if ($task->owner_id == auth()->user()->id) {
            $task->update([
                'status' => $request->status,
            ]);
            return redirect()->route('task.show', $task)->with('success', 'Task status changed successfully.');
        } else {
            return redirect()->route('task.index')->with('success', 'You are not authorized to change this idea status.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = base64_decode($id);

        $task = Task::find($id);
        if ($task->owner_id == auth()->user()->id) {

            $category = Select::of('task')->type('category')->get();
            $status = Select::of('task')->type('status')->get();

            return view('features.task.edit', compact('task', 'category', 'status'));
        } else {
            return redirect()->route('task.index')->with('success', 'You are not authorized to edit this idea.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, string $id)
    {

        $id = base64_decode($id);

        $task = Task::find($id);

        if (!$task || $task->owner_id != auth()->user()->id) {
            return redirect()->route('idea.index')->with('success', 'Something went wrong.');
        }
        if ($request->has('add_attachments')) {
            $file = $task->updateFile($request->add_attachments);
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
            notify()->success(__('Deleted successfully!'));
            return redirect()->route('task.index');
        } else {
            return redirect()->route('task.index')->with('error', 'You are not authorized to delete this idea.');
        }
    }

    public function search(SearchRequest $request)
    {
        $tasks = SearchService::items($request);
        return view('features.task.index', compact('tasks'));
    }
}
