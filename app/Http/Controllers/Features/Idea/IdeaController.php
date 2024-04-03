<?php
namespace App\Http\Controllers\Features\Idea;

use App\Enums\Stage;
use App\Models\Idea;
use App\Models\User;
use App\Models\Select;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Requests\IdeaRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Notifications\NotificationSystem;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ideas = Product::find(productId())->ideas()->latest()->paginate(10);
        $priorities = Select::of('idea')->type('priority')->get();

        return view('features.idea.index', compact('ideas', 'priorities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $priorities = Select::of('idea')->type('priority')->get();
        $stages     = Stage::cases();
        return view('features.idea.partials.create', compact('priorities', 'stages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdeaRequest $request)
    {
        $data = $request->except('_token');
        $idea = Idea::create($data);
        notify()->success(trans('Created successfully!'));
        return redirect()->route('idea.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Idea $idea)
    {
        $idea->loadComments();
        $comments = $idea->comments;
        $stages = Stage::cases();
        $creator = User::where('id', $idea->creator_id)->with('image')->first();
        $priorities = Select::of('idea')->type('priority')->get();

        return view('features.idea.partials.show', compact('idea', 'comments', 'stages', 'priorities', 'creator'));
    }

    public function upadatePriority(Request $request, Idea $idea)
    {
        $idea->update(['stage' => $request->stage]);

        notify()->success(trans('Updated successfully!'));
        return redirect()->route('idea.show', $idea);
    }

    public function generatePdf(Idea $idea)
    {
        $stages = Stage::cases();

        // $dompdf = new Dompdf();
        // $dompdf->loadHtml(view('features.idea.partials.pdf', compact('idea', 'stages')));
        // $dompdf->setPaper('A4', 'landscape');
        // $dompdf->render();
        // $dompdf->stream();
        return view('features.idea.partials.pdf', compact('idea', 'stages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Idea $idea)
    {
        $priorities = Select::of('idea')->type('priority')->get();
        $stages     = Select::of('product')->type('stage')->get();
        return view('features.idea.partials.edit', compact('idea', 'priorities', 'stages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdeaRequest $request, Idea $idea)
    {
        $data = $request->except('_token', '_method');
        $idea->update($data);

        notify()->success(trans('Updated successfully!'));
        return redirect()->route('idea.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Idea $idea)
    {
        $idea->delete();
        notify()->success(trans('Deleted successfully!'));
        return redirect()->route('idea.index');
    }

    public function search(SearchRequest $request)
    {
        $ideas = SearchService::items($request);
        $stages = Select::of('idea')->type('stage')->get();
        return view('features.idea.index', compact('ideas', 'stages'));
    }

    // public function notify()
    // {
    //     $idea = Idea::first();
    //     auth()->user()->notify(new IdeaNotification($idea));
    // }
}
