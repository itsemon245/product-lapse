<?php

namespace App\Http\Controllers\Features\Task;

use App\Models\Idea;
use App\Models\Task;
use App\Models\User;
use App\Models\Select;
use App\Models\Product;
use App\Services\SearchService;
use App\Http\Requests\TaskRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Database\QueryException;

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
        $tasks = Product::find(productId())->tasks()->paginate(10);
        $priorities = Select::of('task')->type('status')->get();
        return view('features.task.index', compact('tasks', 'priorities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $task = Idea::find(request()->query('idea'));
        $categories = Select::of('task')->type('category')->get();
        $statuses = Select::of('task')->type('status')->get();

        return view('features.task.partials.create', compact('categories', 'statuses', 'task'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(TaskRequest $request)
    {

        $task = Task::create([
            'creator_id' => ownerId(),
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
        $user = User::with('image')->find($task->creator_id);
        $task->loadComments();
        $comments = $task->comments;
        return view('features.task.partials.show', compact('task', 'user', 'comments'));

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

        $categories = Select::of('task')->type('category')->get();
        $statuses = Select::of('task')->type('status')->get();
        return view('features.task.partials.edit', compact('task', 'categories', 'statuses'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task = Task::with('file')->find($task->id);

        if ($request->has('add_attachments')) {
            if ($task->file) {
                $file = $task->updateFile($request->add_attachments);
            } else {
                $task->storeFile($request->add_attachments);
            }

        }

        $data = $request->except('_token', 'add_attachments');
        $data['owner_id'] = ownerId();

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

        notify()->success(__('Updated Successfully!'));
        return redirect()->route('task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {

        $taskk = Task::with('file')->find($task->id);

        if ($taskk->file) {
            $fileDeleted = $taskk->deleteFile($task->file);
        }
        $taskk->delete();

        notify()->success(__('Deleted successfully!'));
        return redirect()->route('task.index');


    }

    public function search(SearchRequest $request)
    {
        $tasks = SearchService::items($request);
        $priorities = Select::of('task')->type('status')->get();
        return view('features.task.index', compact('tasks', 'priorities'));
    }
}
