<?php

namespace App\Http\Controllers\Features\Delivery;

use App\Models\File;
use Exception;

use App\Models\User;
use App\Models\Hello;
use App\Models\Product;
use App\Models\Delivery;
use Illuminate\Http\Request;
use App\Services\SearchService;
use App\Http\Controllers\Controller;
use App\Http\Requests\SearchRequest;
use App\Http\Requests\DeliveryRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = Product::find(productId())->deliveries()->paginate();
        return view('features.delivery.index', compact('deliveries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Product::find(productId())->users;

        return view('features.delivery.partials.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeliveryRequest $request)
    {
        $data = $request->except('_token', 'add_attachments');
        $data['creator_id'] = ownerId();
        try {
            $delivery = Delivery::create($data);
            if ($request->has('add_attachments')) {
                foreach ($request->add_attachments as $file) {
                    $delivery->storeFile($file);
                }
            }
            notify()->success(__('Created successfully!'));
            return redirect()->route('delivery.index');
        } catch (Exception $e) {
            notify()->error(__('Create failed!'));
            return redirect()->route('delivery.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Delivery $delivery)
    {
        $delivery = Delivery::with('files')->find($delivery->id);
        $creator = User::with('image')->find($delivery->creator_id);
        $delivery->loadComments();
        $comments = $delivery->comments;
        return view('features.delivery.partials.show', compact('delivery', 'creator', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Delivery $delivery)
    {
        $users = Product::find(productId())->users;

        return view('features.delivery.partials.edit', compact('delivery', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */


    public function update(DeliveryRequest $request, Delivery $delivery)
    {
        $data = $request->except('_token', '_method', 'add_attachments');

        try {
            DB::beginTransaction();

            $delivery = Delivery::with('files')->find($delivery->id);

            if ($request->hasFile('add_attachments')) {
                foreach ($delivery->files as $file) {
                    $delivery->deleteFile($file);
                }
                foreach ($request->file('add_attachments') as $uploadedFile) {
                    $delivery->storeFile($uploadedFile);
                }
            } elseif (!$request->hasFile('add_attachments') && !$delivery->files->isEmpty()) {
                foreach ($delivery->files as $file) {
                    $delivery->deleteFile($file);
                }
            }
            $delivery->update($data);

            DB::commit();
            notify()->success(__('Updated successfully!'));

            return redirect()->route('delivery.index');
        } catch (Exception $e) {
            DB::rollBack();
            notify()->error(__('Update failed!'));
            return redirect()->route('delivery.index');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Delivery $delivery)
    {
        $delivery = Delivery::with('files')->find($delivery->id);
        if ($delivery->files) {
            foreach ($delivery->files as $file) {
                $delivery->deleteFile($file);
            }
        }
        $delivery->delete();
        notify()->success(__('Deleted successfully!'));
        return redirect()->route('delivery.index');
    }

    public function agree(string $id)
    {
        $find = Delivery::find($id);
        $find->update([
            'is_agreed' => 1,
        ]);
        return back();
    }

    public function disagree(string $id)
    {
        $find = Delivery::find($id);
        $find->update([
            'is_agreed' => null,
        ]);
        return back();
    }

    public function downloadFIle(Delivery $delivery, File $file)
    {
        $filePath = $file->path;
        if (!Storage::disk('public')->exists($filePath)) {
            notify()->error(__('File not found!'));

            return redirect()->route('delivery.show', $delivery);
        }

        return Storage::download('public/' . $filePath);
    }

    public function search(SearchRequest $request)
    {
        $deliveries = SearchService::items($request);
        return view('features.delivery.index', compact('deliveries'));
    }
}