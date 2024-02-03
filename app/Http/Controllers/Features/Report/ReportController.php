<?php

namespace App\Http\Controllers\Features\Report;

use App\Models\Report;
use App\Models\Product;
use App\Models\Select;
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
        $type = Select::of('report')->type('type')->get();
        return view('features.report.partials.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request)
    {
        $report = Report::create([
            'owner_id' => ownerId(),
            'name' => $request->name,
            'type' => $request->type,
            'report_date' => $request->report_date,
            'description' => $request->description,
        ]);
        $file = $report->storeImage($request->file);
        notify()->success(__('Created successfully!'));

        return redirect()->route('report.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        return view('features.report.partials.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        $type = Select::of('report')->type('type')->get();
        return view('features.report.partials.edit', compact('report', 'type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReportRequest $request, Report $report)
    {
        $report = Report::find($report->id);
        $file = $report->updateImage($request->file, $report->file);
        $report->update([
            $report->name => $request->name,
            $report->type => $request->type,
            $report->report_date => $request->report_date,
            $report->description => $request->description,
        ]);
        notify()->success(__('Updated successfully!'));
        return redirect()->route('report.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report = Report::find($report->id);
        $image = $report->deleteImage($report->file);
        if ($image) {
            $report->destroy();
            notify()->success(__('Deleted successfully!'));
            return redirect()->route('report.index');
        }

    }

    public function download(string $id)
    {
        $file = Report::with('file')->find($id);
        if (!$file) {
            notify()->success(__('Something went wrong!'));

            return redirect()->route('document.index');
        }

        $filePath = $file->file->path;
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
