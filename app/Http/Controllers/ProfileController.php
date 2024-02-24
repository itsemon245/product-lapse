<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{

    public function index()
    {
        $user = User::with('image')->find(auth()->id());
        if (request()->path() == "admin/profile"){
            return view('admin.profile.index', compact('user'));
        }else{
            return view('profile.index', compact('user'));
        }

     
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        // dd(request()->path());
        if(request()->path() == "admin/profile/edit"){
            return view('admin.profile.edit', [
                'user' => $request->user(),
            ]);
        }else{
            return view('profile.edit', [
                'user' => $request->user(),
            ]);
        }
      
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, string $id): RedirectResponse
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->name,
            'phone' => $request->phone,
        ]);
        $image = $user->storeImage($request->avatar);
        notify()->success(__('Updated successfully!'));
        return back();
    }
    public function address(AddressRequest $request)
    {
        $user = Address::where('user_id', auth()->id())->first();
        if($user == null){
            Address::create([
                'name' => $request->name,
                'user_id' => auth()->id(),
                'type' => $request->type,
                'email' => $request->email,
                'phone' => $request->phone,
                'street' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'zip' => $request->zip,
                'use_as_shipping' => $request->use_as_shipping,
                'ip' => $request->ip,
            ]);
        }else{
            $user->update([
                'name' => $request->name,
                'type' => $request->type,
                'email' => $request->email,
                'phone' => $request->phone,
                'street' => $request->street,
                'city' => $request->city,
                'state' => $request->state,
                'country' => $request->country,
                'zip' => $request->zip,
                'use_as_shipping' => $request->use_as_shipping,
                'ip' => $request->ip,
            ]);
        }
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
