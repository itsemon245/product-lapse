<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\WelcomeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UsersManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = User::where('type', 'subscriber')->orWhere('type', null)
            ->where(function ($q) {
                if (request()->query('search') === 'banned') {
                    $q->whereNotNull('banned_at');
                }
                if (request()->query('search') === 'active') {
                    $q->where('banned_at', null);
                }
                if (request()->query('search') === 'verified') {
                    $q->whereNotNull('email_verified_at');
                }
                if (request()->query('search') === 'unverified') {
                    $q->where('email_verified_at', null);
                }
            })
            ->latest()->paginate(10);
        return view('pages.users.management', compact('subscribers'));
    }

    public function create()
    {
        return view('pages.users.create');
    }

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
            'position'         => $request->position,
            'promotional_code' => $request->promotional_code,
            'owner_id'         => $admin?->id,
         ]);
        $user->notify(new WelcomeNotification($user));
        notify()->success(__('Created successfully!'));

        return redirect()->route('users.index');

    }

    /**
     * Update the specified resource in storage.
     */
    public function ban(Request $request, User $user)
    {
        $user = tap($user)->update([
            'banned_at' => $user->banned_at == null ? now() : null,
         ]);
        if ($user->banned_at == null) {
            $message = __('User has been unbanned!');
        }{
            $message = __('User has been banned!');
        }
        notify()->success($message);
        return back();
    }

    public function active(Request $request, User $user)
    {
        $user = tap($user)->update([
            'email_verified_at' => now(),
            'type'              => 'subscriber',
         ]);
        if ($user->banned_at == null) {
            $message = __('The user has been activated !');
        }{
            $message = __('The user has been unactive !');
        }
        notify()->success($message);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function show(User $user)
    {
        return view('pages.users.show', compact('user'));
    }

    public function filter(Request $request)
    {
        // dd($request->search);
        if ($request->search == null) {
//active
            $subscribers = User::where('banned_at', null)
                ->where('type', '=', 'subscriber')->latest()->paginate(10);
            return view('pages.users.management', compact('subscribers'));
        } elseif ($request->search == 'all') {
            $subscribers = User::where('type', 'subscriber')->orWhere('type', null)->paginate(10);
            return view('pages.users.management', compact('subscribers'));
        } else {
            $subscribers = User::where('banned_at', !null)
                ->where('type', '=', 'subscriber')->latest()->paginate(10);
            return view('pages.users.management', compact('subscribers'));
        }

    }

    public function search(Request $request)
    {
        if ($request->search == null) {
            $subscribers = User::where('type', 'subscriber')->orWhere('type', null)->latest()->paginate(10);
            return view('pages.users.management', compact('subscribers'));
        } else {
            $searchTerm = $request->input('search');

            $subscribers = User::where(function ($query) use ($searchTerm) {
                $query->where('type', 'subscriber')
                    ->orWhereNull('type');
            })->when($searchTerm, function ($query) use ($searchTerm) {
                $query->where(function ($subQuery) use ($searchTerm) {
                    $subQuery->where('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('email', 'like', '%' . $searchTerm . '%')
                        ->orWhere('phone', 'like', '%' . $searchTerm . '%');
                });
            })
                ->latest()
                ->paginate(10);
            return view('pages.users.management', compact('subscribers'));
        }

    }
}
