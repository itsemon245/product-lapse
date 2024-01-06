<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliverableRequest;
use App\Models\Deliverable;
use Illuminate\Http\Request;

class DeliverableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliverables = Deliverable::get();
        return view('features.deliverable.index', compact('deliverables'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('features.deliverable.partials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDeliverableRequest $request)
    {
        Deliverable::create([
            'name' => $request->name,
            'items' => $request->items,
            'link' => $request->link,
            // 'attach_file' => saveImage(),
            'password' => $request->password,
            'administrator' => $request->administrator,
            'add_attachments' => $request->add_attachments
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
    public function update(StoreDeliverableRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Deliverable::find($id)->destroy();
    }
}
