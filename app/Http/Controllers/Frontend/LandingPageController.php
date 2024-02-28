<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Requests\LandingPageRequest;
use App\Http\Requests\PackageRequest;
use App\Models\Contact;
use App\Models\LandingPage;
use App\Models\Package;
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
        $image = $request->file('image');

        $about_us = [
            'image' => $image ? 'img/' . time() . '_' . $image->getClientOriginalName() : $imagePath,
            'caption' => [
                'en' => $validatedData['caption_en'],
                'ar' => $validatedData['caption_ar'],
            ],
        ];

        if ($image) {
            $image->move(public_path('img'), $about_us['image']);
        }

        $old->update(['about_us' => $about_us]);

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
            'package_en' => 'required',
            'package_ar' => 'required',
        ]);

        $old = LandingPage::find($id);
        $imagePath = $old->about_us->image;
        $image = $request->file('image');

        $intro = [
            'image' => $image ? 'img/' . time() . '_' . $image->getClientOriginalName() : $imagePath,
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

        if ($image) {
            $image->move(public_path('img'), $intro['image']);
        }

        $old->update([
            'home' => $intro,
            'package' => [
                'en' => $validatedData['package_en'],
                'ar' => $validatedData['package_ar'],
            ],
        ]);

        notify()->success(__('notify/success.update'));

        return redirect()->route('edit.intro');
    }

    public function editContact()
    {
        $contact = Contact::first();
        return view('edit-contact', compact('contact'));
    }

    public function updateContactUs(Request $request, int $id)
    {
        $request->validate([
            'facebook' => 'url:https,http',
            'twitter' => 'url:https,http',
            'vimeo' => 'url:https,http',
            'pinterest' => 'url:https,http',
        ]);
        $contact = Contact::find($id);

        $contact->update(request()->except('_method', '_token'));

        notify()->success(__('notify/success.update'));

        return redirect()->route('edit.contact.us');
    }

    public function editPackage(int $id)
    {
        $package = Package::find($id);

        return view('edit-package', compact('package'));
    }



    public function updatePackage(PackageRequest $request, int $id)
    {

        $package = Package::find($id);

        $package->update([
            'owner_id' => ownerId(),
            'name' => [
                'en' => $request->input('name_en'),
                'ar' => $request->input('name_ar'),
            ],
            'price' => $request->input('price'),
            'product_limit' => [
                'en' => $request->input('product_limit_en'),
                'ar' => $request->input('product_limit_ar'),
            ],
            'validity' => [
                'en' => $request->input('validity_en'),
                'ar' => $request->input('validity_ar'),
            ],
            'features' => [
                'en' => $request->input('feature_en'),
                'ar' => $request->input('feature_ar'),
            ],
            'is_popular' => $request->has('is_popular') ? true : false,
        ]);

        notify()->success(__('notify/success.update'));

        return redirect()->route('edit.package', $id);

    }
    public function createInput()
    {

    }

}
