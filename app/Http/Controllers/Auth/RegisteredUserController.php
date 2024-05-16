<?php

namespace App\Http\Controllers\Auth;

use App\Models\Page;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Notifications\WelcomeNotification;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $terms = Page::where('slug', 'terms-conditions')->first();
        return view('auth.register', compact('terms'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $request->validate([
            'email'            => [ 'required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class ],
            'password'         => [ 'required', Rules\Password::defaults() ],
            'first_name'       => [ 'nullable', 'string', 'max:40' ],
            'last_name'        => [ 'nullable', 'string', 'max:40' ],
            'phone'            => [ 'nullable', 'string', 'max:40' ],
            'workplace'        => [ 'nullable', 'string', 'max:40' ],
            'position'         => [ 'nullable', 'string', 'max:40' ],
            'promotional_code' => [ 'nullable', 'string', 'max:40' ],
         ]);
        $admin = User::admin()->first();

        $user = User::create([
            'email'            => $request->email,
            'password'         => Hash::make($request->password),
            'name'             => $request->first_name . " " . $request->last_name,
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'phone'            => $request->phone,
            'workplace'        => $request->workplace,
            'job_title'         => $request->position,
            'promotional_code' => $request->promotional_code,
            'owner_id'         => $admin?->id,
         ]);
        //  $user->notify(new WelcomeNotification($user));
        // event(new Registered($user));
        $user->sendEmailVerificationNotification();
        Auth::login($user, true);

        return view('auth.registration-success');
    }
}
