<?php

namespace App\Http\Controllers\Features\Task;

use App\Models\Task;
use App\Models\Product;
use App\Models\Select;
use App\Services\SearchService;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use App\Http\Requests\SearchRequest;

class TaskController extends Controller
{

    public function __construct()
    {
        app()->setLocale('en');
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Product::find(productId())->tasks;
        return view('features.task.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Select::of('task')->type('category')->get();
        $status = Select::of('task')->type('status')->get();

        return view('features.task.partials.create', compact('category', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(TaskRequest $request)
    {
        $task = Task::create([
            'owner_id' => ownerId(),
            'name' => $request->name,
            'category' => $request->category,
            'status' => $request->status,
            'choose_mvp' => $request->has('choose_mvp'),
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
        return view('features.task.partials.show', compact('task'));

    }

    public function changeStatus(TaskRequest $request, Task $task)
    {
        $task->update([
            'status' => $request->status,
        ]);
        notify()->success(__('Updated Successfully!'));
        return redirect()->route('task.show', $task);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {

        $category = Select::of('task')->type('category')->get();
        $status = Select::of('task')->type('status')->get();

        return view('features.task.partials.edit', compact('task', 'category', 'status'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        if ($request->has('add_attachments')) {
            $file = $task->updateFile($request->add_attachments);
        }

        $task->update([
            'owner_id' => ownerId(),
            'name' => $request->name,
            'category' => $request->category,
            'status' => $request->status,
            'choose_mvp' => $request->has('choose_mvp'),
            'details' => $request->details,
            'steps' => $request->steps,
            'starting_date' => $request->starting_date,
            'ending_date' => $request->ending_date,
            'administrator' => $request->administrator,
        ]);

        if ($request->has('add_attachments')) {
            $task->storeFile($request->add_attachments);
        }

        notify()->success(__('Updated Successfully!'));
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();

        notify()->success(__('Deleted successfully!'));
        return redirect()->route('task.index');
    }

    public function search(SearchRequest $request)
    {
        $tasks = SearchService::items($request);
        return view('features.task.index', compact('tasks'));
    }
}
