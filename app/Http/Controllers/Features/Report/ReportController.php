<?php

namespace App\Http\Controllers\Features\Report;

use App\Models\Report;
use App\Models\Select;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReportRequest;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reports = Report::get();
        return view('features.report.index', compact('reports'));
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
        // dd($request->file);
        $report = Report::create([
            'owner_id' => auth()->id(),
            'name' => $request->name,
            'type' => $request->type,
            'report_date' => $request->report_date,
            'description' => $request->description,
        ]);
        $file = $report->storeImage($request->file);
        if ($file) {
            return redirect()->route('report.index')->with(['success', 'Store Success!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $report = Report::find($id);
        if ($report != null) {
            return view('features.report.partials.show', compact('report'));
        }
        return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $report = Report::find($id);
        $type = Select::of('report')->type('type')->get();
        if ($report != null) {
            return view('features.report.partials.show', compact('report', 'type'));
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReportRequest $request, string $id)
    {
        $report = Report::find($id);
        $file = $report->updateImage($request->file, $report->file);
        $report->update([
            $report->name => $request->name,
            $report->type => $request->type,
            $report->report_date => $request->report_date,
            $report->description => $request->description,
        ]);
        return redirect()->route('report.index')->with(['success', 'Update Success!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $report = Report::find($id);
        $image = $report->deleteImage($report->file);
        if ($image) {
            $report->destroy();
            return redirect()->route('report.index')->with(['success', 'Delete Success!']);
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
}
