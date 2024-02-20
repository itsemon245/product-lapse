<?php

namespace App\Http\Controllers\Features\Document;

use App\Models\User;
use App\Models\Select;
use App\Models\Product;
use App\Models\Document;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\DocumentRequest;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Product::find(productId())->documents()->paginate(10);
        $types = Select::of('document')->type('type')->get();
        return view('features.document.index', compact('documents', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $type = Select::of('document')->type('type')->get();
        return view('features.document.partials.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(DocumentRequest $request)
    {

        $data = $request->except('_token', 'attach_file');
        $data['creator_id'] = ownerId();

        $document = Document::create($data);
        if ($request->has('attach_file')) {
            $document->storeFile($request->attach_file);
        }
        notify()->success(__('Created successfully!'));

        return redirect()->route('document.index');
    }

    public function download(string $id)
    {
        $id = base64_decode($id);
        $document = Document::with('file')->find($id);

        if (!$document) {
            notify()->success(__('Something went wrong!'));

            return redirect()->route('document.index');
        }

        $filePath = $document->file->path;
        if (!Storage::disk('public')->exists($filePath)) {
            notify()->error(__('File not found!'));

            return redirect()->route('document.index');
        }

        return Storage::download('public/' . $filePath);

    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        $user = User::with('image')->find($document->creator_id);
        $document->loadComments();
        $comments = $document->comments;
        return view('features.document.partials.show', compact('document', 'user', 'comments'));
    }

    public function updateVersion(Request $request, Document $document)
    {
        $document->update(['version' => $request->version]);

        notify()->success(__('Updated successfully!'));

        return redirect()->route('document.show', $document);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        $type = Select::of('document')->type('type')->get();
        return view('features.document.partials.edit', compact('document', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentRequest $request, Document $document)
    {

        $document = Document::with('file')->find($document->id);

        if ($request->has('attach_file')) {
            $file = $document->updateFile($request->attach_file);
        }

        $data = $request->except('_token', 'attach_file');
        $document->update($data);
        notify()->success(__('Updated successfully!'));

        return redirect()->route('document.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Document $document)
    {

        $document = Document::with('file')->find($document->id);

        if ($document->file) {
            $fileDeleted = $document->deleteFile($document->file);
        }

        $document->delete();

        notify()->success(__('Deleted successfully!'));
        return redirect()->route('document.index');
    }

    public function search(SearchRequest $request)
    {
        $documents = SearchService::items($request);
        $types = Select::of('document')->type('type')->get();
        return view('features.document.index', compact('documents', 'types'));
    }

}
