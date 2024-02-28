<?php

namespace App\Http\Controllers;

use App\Http\Requests\HomeFeatureRequest;
use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $features = Feature::paginate(10);

        return view('homeFeatures.index', compact('features'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('homeFeatures.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HomeFeatureRequest $request)
    {
        $title = [
            'en' => $request->title_en,
            'ar' => $request->title_ar,
        ];
        $caption = [
            'en' => $request->caption_en,
            'ar' => $request->caption_ar,
        ];
        $image = $request->file('image');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('img'), $imageName);

        Feature::create([
            'image' => 'img/' . $imageName,
            'title' => $title,
            'caption' => $caption,
        ]);

        notify()->success(__('notify/success.create'));

        return redirect()->route('features.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('homeFeatures.edit', compact('feature'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        $title = [
            'en' => $request->title_en,
            'ar' => $request->title_ar,
        ];
        $caption = [
            'en' => $request->caption_en,
            'ar' => $request->caption_ar,
        ];

        $feature->update([
            'title' => $title,
            'caption' => $caption,
        ]);

        if ($request->hasFile('image')) {

            $newImage = $request->file('image');
            $newImageName = time() . '_' . $newImage->getClientOriginalName();

            if (File::exists(public_path($feature->image))) {
                File::delete(public_path($feature->image));
            }
            $newImage->move(public_path('img'), $newImageName);

            $feature->update(['image' => 'img/' . $newImageName]);
        }

        notify()->success(__('notify/success.update'));

        return redirect()->route('features.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        $imagePath = public_path($feature->image);
        $feature->delete();

        File::delete($imagePath);

        notify()->success(__('notify/success.delete'));

        return redirect()->route('features.index');
    }
}
