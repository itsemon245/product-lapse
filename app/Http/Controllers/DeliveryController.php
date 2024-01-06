<?php

namespace App\Http\Controllers;

use App\Models\Delivery;
use App\Models\Deliverable;
use Illuminate\Http\Request;
use App\Http\Requests\DeliveryRequest;


class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliverables = Delivery::get();
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
    public function store(DeliveryRequest $request)
    {
        $store = Delivery::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'items' => $request->items,
            'link' => $request->link,
            'attach_file' => saveImage($request->attach_file, 'deliverable/' . auth()->id() . '/' . 'attach-file'),
            'password' => $request->password,
            'administrator' => $request->administrator,
            'add_attachments' => saveImage($request->add_attachments, 'deliverable/' . auth()->id() . '/' . 'add-attachments'),
        ]);
        if($store){
            return back()->with(['success', 'Add Deliverable!']);
        }else{
            return back()->with(['error', 'Something Wrong.']);
        }
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
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeliveryRequest $request, string $id)
    {
        $find = Delivery::find($id);
        $find->update([
            $find->name => $request->name,
            $find->items => $request->items,
            $find->link => $request->link,
            $old_path = $find->attach_file,
            $find->attach_file => updateFile($old_path, 'deliverable/' . auth()->id() . '/' . 'attach-file', 'public'),
            $find->password => $request->password,
            $find->administrator => $request->administrator,
            $old_path = $find->add_attachments,
            $find->add_attachments => updateFile($old_path , 'deliverable/' . auth()->id() . '/' . 'add-attachments', 'public'),
        ]);
        if($find){
            return back()->with(['success', 'Update Deliverable!']);
        }else{
            return back()->with(['error', 'Something Wrong.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Delivery::find($id)->destroy();
    }
}
