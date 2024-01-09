<?php

namespace App\Http\Controllers;

use App\Models\Hello;
use Exception;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Http\Requests\DeliveryRequest;


class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Delivery::get();
        return view('features.delivery.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $deliveries = Delivery::get();
        return view('features.delivery.partials.create', compact('deliveries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($yourModel);
        // $store = Delivery::create([
        //     'owner_id' => auth()->id(),
        //     'name' => $request->name,
        //     'items' => $request->items,
        //     'link' => $request->link,
        //     'attach_file' => saveImage($request->attach_file, 'delivery/' . auth()->id() . '/' . 'attach-file'),
        //     'password' => $request->password,
        //     'administrator' => $request->administrator,
        //     'add_attachments' => saveImage($request->add_attachments, 'delivery/' . auth()->id() . '/' . 'add-attachments'),
        // ]);
        // if($store){
        //     return back()->with(['success', 'Add Delivery!']);
        // }else{
        //     return back()->with(['error', 'Something Wrong.']);
        // }
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
        try {
            // Assuming the model has a 'content' column
            $yourModel = Delivery::find($request->input('itemId'));
                dd($yourModel);
            if ($yourModel) {
                // Update the content
                $yourModel->content = $request->input('newContent');
                $yourModel->save();

                return response()->json(['success' => true]);
            } else {
                return response()->json(['error' => 'Item not found'], 404);
            }
        } catch (\Exception $e) {
            // Handle exceptions if any
            return response()->json(['error' => $e->getMessage()], 500);
        }

        // $find = Delivery::find($id);
        // dd($find);
        // $find->update([
        //     $find->name => $request->name,
        //     $find->items => $request->items,
        //     $find->link => $request->link,
        //     $old_path = $find->attach_file,
        //     $find->attach_file => updateFile($old_path, 'delivery/' . auth()->id() . '/' . 'attach-file', 'public'),
        //     $find->password => $request->password,
        //     $find->administrator => $request->administrator,
        //     $old_path = $find->add_attachments,
        //     $find->add_attachments => updateFile($old_path , 'delivery/' . auth()->id() . '/' . 'add-attachments', 'public'),
        // ]);
        // if($find){
        //     return back()->with(['success', 'Update Delivery!']);
        // }else{
        //     return back()->with(['error', 'Something Wrong.']);
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Delivery::find($id)->destroy();
    }

    // public function storyy(Request $request){
    //     $data = $request->all();
    //     $name = $request->input('newContent');
    //     // var_dump($name);
    //     Hello::create([
    //         'data' => $name,
    //     ]);
    // }
}