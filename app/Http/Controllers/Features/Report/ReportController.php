<?php

namespace App\Http\Controllers\Features\Report;

use App\Http\Requests\ReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        return view('features.report.partials.create');
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
        if($file){
            return redirect()->route('report.index')->with(['success', 'Store Success!']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $report = Report::find($id);
        return view('features.report.partials.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $report = Report::find($id);
        return view('features.report.partials.edit', compact('report'));
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
        if($image){
            $report->destroy();
            return redirect()->route('report.index')->with(['success', 'Delete Success!']);
        }
  
    }
}
