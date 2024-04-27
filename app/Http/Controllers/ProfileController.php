<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Address;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{

    public function index()
    {
        $user = User::with('image')->find(auth()->id());

        return view('profile.index', compact('user'));

    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {

        return view('profile.edit', [
            'user' => $request->user(),
         ]);

    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request, string $id): RedirectResponse
    {
        $user = User::find($id);
        $user->update([
            'name' => $request->first_name . " " .$request->last_name,
            ...$request->only('first_name', 'last_name', 'email', 'phone', 'workplace'),
         ]);
        $image = $user->storeImage($request->avatar);
        notify()->success(__('Updated successfully!'));
        return back();
    }

    public function editAddress() {
        return view('profile.update-address', [
            'user' => request()->user(),
         ]);
    }

    public function address(AddressRequest $request)
    {
        $user = Address::where('user_id', auth()->id())->first();
        if ($user == null) {
            Address::create([
                'name'            => $request->name,
                'user_id'         => auth()->id(),
                'type'            => $request->type ?? 'billing',
                'email'           => $request->email,
                'phone'           => $request->phone,
                'street'          => $request->street,
                'city'            => $request->city,
                // 'state'           => $request->state,
                'country'         => $request->country,
                // 'zip'             => $request->zip,
                'ip'              => $request->ip(),
             ]);
        } else {
            $user->update([
                'name'            => $request->name,
                'type'            => $request->type ?? 'billing',
                'email'           => $request->email,
                'phone'           => $request->phone,
                'street'          => $request->street,
                'city'            => $request->city,
                // 'state'           => $request->state,
                'country'         => $request->country,
                // 'zip'             => $request->zip,
                'ip'              => $request->ip(),
             ]);
        }
        notify()->success(__('Updated Successfully!'));
        if (session()->has('package-url')) {
            $url = session('package-url');
            session()->forget('package-url');
            return redirect($url);
        }
        return back();
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => [ 'required', 'current_password' ],
         ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
