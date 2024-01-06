<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreChangeRequest;
use App\Models\ChangeRequest;
use Illuminate\Http\Request;

class ChangeRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $changeRequests = ChangeRequest::get();
        return view('features.change-request.index', compact('changeRequests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.change-request.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChangeRequest $request)
    {
        dd($request);
        ChangeRequest::update([
            'title' => $request->title,
            'classification' => $request->classification,
            'priority' => $request->priority,
            'status' => $request->status,
            'details' => $request->details,
            'administrator' => $request->administrator,
            'required_completion_date' => $request->required_completion_date,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        dd($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreChangeRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
        $data = ChangeRequest::destroy($id);
        return back()->with(['success', 'Delete Success!']);
    }
}
