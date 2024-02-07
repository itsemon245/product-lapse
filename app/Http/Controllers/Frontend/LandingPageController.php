<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\LandingPageRequest;
use App\Models\LandingPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{

    /**
     * Update the specified resource in storage.
     */
    public function update(LandingPageRequest $request)
    {
        $key = $request->key;
        $value = $request->value;
        $landingPage = LandingPage::first();
        $landingPage = tap($landingPage)->update([
            "home->$key" => $value
        ]);
        return $landingPage->home->{$key};
    }
    public function updateAbout(LandingPageRequest $request)
    {
        $key = $request->key;
        $value = $request->value;
        $landingPage = LandingPage::first();
        $landingPage = tap($landingPage)->update([
            "about_us->$key" => $value
        ]);
        return $landingPage->about_us->{$key};
    }
    public function updateContact(LandingPageRequest $request)
    {
        $key = $request->key;
        $value = $request->value;
        $landingPage = LandingPage::first();
        $landingPage = tap($landingPage)->update([
            "contact_us->$key" => $value
        ]);
        return $landingPage->contact_us->{$key};
    }

    public function editAboutUs()
    {
        $info = LandingPage::first();

        return view('homeFeatures.about-us', compact('info'));
    }

    public function updateAboutUs(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'caption_en' => 'required',
            'caption_ar' => 'required',
        ]);
        $old = LandingPage::find($id);

        $imagePath = $old->about_us->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);

            $about_us = [
                'image' => 'img/' . $imageName,
                'caption' => [
                    'en' => $validatedData['caption_en'],
                    'ar' => $validatedData['caption_ar'],
                ],
            ];

            $old->update([
                'about_us' => $about_us,
            ]);

        } else {
            $about_us = [
                'image' => $imagePath,
                'caption' => [
                    'en' => $validatedData['caption_en'],
                    'ar' => $validatedData['caption_ar'],
                ],
            ];

            $old->update([
                'about_us' => $about_us,
            ]);
        }

        notify()->success(__('notify/success.update'));

        return redirect()->route('edit.about_us');
    }

    public function editIntro()
    {
        $info = LandingPage::first();

        return view('homeFeatures.intro', compact('info'));
    }

    public function updateIntro(Request $request, int $id)
    {
        $validatedData = $request->validate([
            'title_en' => 'required',
            'title_ar' => 'required',
            'caption_en' => 'required',
            'caption_ar' => 'required',
            'button_en' => 'required',
            'button_ar' => 'required',
        ]);

        $old = LandingPage::find($id);

        $imagePath = $old->about_us->image;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('img'), $imageName);

            $intro = [
                'image' => 'img/' . $imageName,
                'title' => [
                    'en' => $validatedData['title_en'],
                    'ar' => $validatedData['title_ar'],
                ],
                'caption' => [
                    'en' => $validatedData['caption_en'],
                    'ar' => $validatedData['caption_ar'],
                ],
                'button' => [
                    'en' => $validatedData['button_en'],
                    'ar' => $validatedData['button_ar'],
                ],
            ];

            $old->update([
                'home' => $intro,
            ]);

        } else {
            $intro = [
                'image' => $imagePath,
                'title' => [
                    'en' => $validatedData['title_en'],
                    'ar' => $validatedData['title_ar'],
                ],
                'caption' => [
                    'en' => $validatedData['caption_en'],
                    'ar' => $validatedData['caption_ar'],
                ],
                'button' => [
                    'en' => $validatedData['button_en'],
                    'ar' => $validatedData['button_ar'],
                ],
            ];

            $old->update([
                'home' => $intro,
            ]);
        }

        notify()->success(__('notify/success.update'));

        return redirect()->route('edit.intro');
    }
}
