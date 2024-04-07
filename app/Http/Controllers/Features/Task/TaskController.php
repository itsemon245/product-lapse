<?php

namespace App\Http\Controllers\Features\Task;

use App\Models\File;
use App\Models\Idea;
use App\Models\Task;
use App\Models\User;
use App\Models\Select;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class TaskController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Product::find(productId())->tasks()->latest()->paginate(10);
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

        $users = Product::find(productId())->users;

        return view('features.task.partials.create', compact('categories', 'statuses', 'task', 'users'));
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
            foreach ($request->add_attachments as $file) {
                $task->storeFile($file);
            }
        }

        notify()->success(__('Created Successfully!'));
        return redirect()->route('task.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $task = Task::with('files')->find($task->id);
        $creator = User::where('id', $task->creator_id)->with('image')->first();
        $task->loadComments();
        $comments = $task->comments;

        $statuses = Select::of('task')->type('status')->get();

        return view('features.task.partials.show', compact('task', 'creator', 'comments', 'statuses'));

    }

    public function downloadFIle(Task $task, File $file)
    {
        $filePath = $file->path;
        if (!Storage::disk('public')->exists($filePath)) {
            notify()->error(__('File not found!'));

            return redirect()->route('task.show', $task);
        }

        return Storage::download('public/' . $filePath);
    }
    public function deleteFile(File $file)
    {
        $filePath = $file->path;
        if (Storage::disk('public')->exists($filePath)) {
            Storage::delete("storage/".$filePath);
            $file->delete();
        }
        notify()->success('Deleted Successfully!');
        return back();
    }

    public function changeStatus(Request $request, Task $task)
    {
        $data = [
            'choose_mvp' => $request->has('choose_mvp') ? true : false,
        ];

        if ($request->has('status')) {
            $data['status'] = $request->status;
        }

        $task->update($data);

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

        $users = Product::find(productId())->users;

        return view('features.task.partials.edit', compact('task', 'categories', 'statuses', 'users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskRequest $request, Task $task)
    {
        $task = Task::with('files')->find($task->id);

        if ($request->has('add_attachments')) {
            if ($task->files) {
                foreach ($task->files as $file) {
                    $task->deleteFile($file);
                }
                foreach ($request->add_attachments as $file) {
                    $task->storeFile($file);
                }
            } else {
                foreach ($request->add_attachments as $file) {
                    $task->storeFile($file);
                }
            }
        }

        $data = $request->except('_token', 'add_attachments');

        $task->update([
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

        $taskk = Task::with('files')->find($task->id);

        if ($taskk->files) {
            foreach ($taskk->files as $file) {
                $taskk->deleteFile($file);
            }
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
