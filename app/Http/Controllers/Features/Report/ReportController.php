<?php

namespace App\Http\Controllers\Features\Report;

use App\Models\User;
use App\Models\Report;
use App\Models\Select;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use App\Http\Requests\SearchRequest;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Product::find(productId())->reports()->paginate(10);
        $types = Select::of('report')->type('type')->get();
        return view('features.report.index', compact('reports', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Select::of('report')->type('type')->get();
        return view('features.report.partials.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request)
    {
        $report = Report::create([
            'creator_id' => auth()->id(),
            'name' => $request->name,
            'type' => $request->type,
            'report_date' => $request->report_date,
            'description' => $request->description,
        ]);
        if ($request->has('file')) {
            $report->storeFile($request->file);
        }
        notify()->success(__('Created successfully!'));

        return redirect()->route('report.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        $user = User::with('image')->find($report->creator_id);
        $report->loadComments();
        $comments = $report->comments;
        return view('features.report.partials.show', compact('report', 'user', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        $types = Select::of('report')->type('type')->get();
        return view('features.report.partials.edit', compact('report', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReportRequest $request, Report $report)
    {
        $report = Report::find($report->id);

        if ($request->has('file')) {
            $file = $report->updateFile($request->file);
        }

        $data = $request->except('_token', 'file');
        $report->update($data);

        notify()->success(__('Updated successfully!'));
        return redirect()->route('report.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $reportWithFile = Report::with('file')->find($report->id);

        if ($reportWithFile->file) {
            $fileDeleted = $reportWithFile->deleteFile();
        }

        $reportWithFile->delete();

        notify()->success(__('Deleted successfully!'));

        return redirect()->route('report.index');
    }

    public function download(string $id)
    {
        $id = base64_decode($id);
        $report = Report::with('file')->find($id);

        if (!$report) {
            notify()->success(__('Something went wrong!'));

            return redirect()->route('report.index');
        }

        $filePath = $report->file->path;
        if (!Storage::disk('public')->exists($filePath)) {
            notify()->error(__('File not found!'));

            return redirect()->route('report.index');
        }

        return Storage::download('public/' . $filePath);

    }

    public function search(SearchRequest $request)
    {
        $reports = SearchService::items($request);
        $types = Select::of('report')->type('type')->get();
        return view('features.report.index', compact('reports', 'types'));
    }
}
