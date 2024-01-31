<?php

namespace App\Http\Controllers\Features\Document;

use App\Models\Select;
use App\Models\Document;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::with('file')->where('owner_id', auth()->id())->get();
        return view('features.document.index', compact('documents'));
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

    public function store(Request $request)
    {
        $request->validate(Document::rules());

        $data = $request->except('_token', 'attach_file');
        $data['owner_id'] = auth()->id();

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
    public function show(string $id)
    {
        $id = base64_decode($id);
        $document = Document::with('file')->find($id);

        if (!$document) {
            notify()->success(__('Something went wrong!'));

            return redirect()->route('document.index');
        }

        return view('features.document.partials.show', compact('document'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $id = base64_decode($id);
        $document = Document::with('file')->find($id);

        if (!$document) {
            notify()->success(__('Document not found!'));
            return redirect()->route('document.index');
        }
        $type = Select::of('document')->type('type')->get();
        return view('features.document.partials.edit', compact('document', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $rules = Document::rules();
        Arr::forget($rules, 'attach_file');

        $request->validate($rules);

        $id = base64_decode($id);
        $document = Document::with('file')->find($id);

        if (!$document) {
            notify()->success(__('Document not found!'));
            return redirect()->route('document.index');
        }

        if ($request->has('attach_file')) {
            $file = $document->updateFile($request->attach_file, $document->file);
        }

        $data = $request->except('_token', 'attach_file');
        $data['owner_id'] = auth()->id();

        $document->update($data);
        notify()->success(__('Updated successfully!'));

        return redirect()->route('document.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $id = base64_decode($id);
        $document = Document::with('file')->find($id);

        if (!$document) {
            dd("document not found");
            notify()->success(__('Document not found!'));
            return redirect()->route('document.index');
        }

        $fileDeleted = $document->deleteFile($document->file);

        if (!$fileDeleted) {
            dd("delete file failed");
            notify()->error(__('Error deleting the file.'));
            return redirect()->route('document.index');
        }

        $document->delete();

        notify()->success(__('Deleted successfully!'));
        return redirect()->route('document.index');
    }

    public function search(SearchRequest $request)
    {
        $documents = SearchService::items($request);
        return view('features.document.index', compact('documents'));
    }

}
