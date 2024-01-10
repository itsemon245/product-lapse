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
    public function updateAbout(LandingPageRequest $request){
        $key = $request->key;
        $value = $request->value;
        $landingPage = LandingPage::first();
        $landingPage = tap($landingPage)->update([
            "about_us->$key" => $value
        ]);
        return $landingPage->about_us->{$key};
    }
    public function updateContact(LandingPageRequest $request){
        $key = $request->key;
        $value = $request->value;
        $landingPage = LandingPage::first();
        $landingPage = tap($landingPage)->update([
            "contact_us->$key" => $value
        ]);
        return $landingPage->contact_us->{$key};
    }
}
