<?php

namespace App\Http\Controllers\Admin;

use App\Models\Plan;
use App\Models\User;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Notifications\WelcomeNotification;

class UsersManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subscribers = User::where('type', 'subscriber')->orWhere('type', null)->latest()->paginate();

        if (!empty(request()->query('search'))) {
            $subscribers = User::where(function ($q) {
                if (request()->query('search') == 'banned') {
                    $q->whereNotNull('banned_at');
                }
                if (request()->query('search') == 'active') {
                    $q->where('banned_at', null);
                }
                if (request()->query('search') == 'verified') {
                    $q->whereNotNull('email_verified_at');
                }
                if (request()->query('search') == 'unverified') {
                    $q->where('email_verified_at', null);
                }
            })->latest()->paginate();
        }
        return view('pages.users.management', compact('subscribers'));
    }

    public function create()
    {
        $packages      = Package::get();
        $activePlan    = null;
        $activePackage = null;
        $packageId     = request()->query('package_id');
        if (!empty($packageId)) {
            $activePackage = Package::find($packageId);
        }
        return view('pages.users.create', compact('packages', 'activePlan', 'activePackage'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'            => [ 'required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email' ],
            'password'         => [ 'required', Rules\Password::defaults() ],
            'first_name'       => [ 'nullable', 'string' ],
            'last_name'        => [ 'nullable', 'string' ],
            'phone'            => [ 'nullable', 'string', 'max:40' ],
            'workplace'        => [ 'nullable', 'string', 'max:40' ],
            'position'         => [ 'nullable', 'string', 'max:40' ],
            'promotional_code' => [ 'nullable', 'string', 'max:40' ],
            'unit'             => "string|nullable",
            'validity'         => "integer|nullable",
         ]);
        $admin = User::admin()->first();

        $user = User::create([
            'email'             => $request->email,
            'password'          => Hash::make($request->password),
            'name'              => $request->first_name . " " . $request->last_name,
            'first_name'        => $request->first_name,
            'last_name'         => $request->last_name,
            'phone'             => $request->phone,
            'workplace'         => $request->workplace,
            'position'          => $request->position,
            'promotional_code'  => $request->promotional_code,
            'owner_id'          => $admin?->id,
            "email_verified_at" => now(),
         ]);

        $activePlan = $user->activePlan()->first();
        $package    = Package::find($request->package_id);
        $expireDate = $request->validity != null ? now()->add($request->unit, $request->validity) : null;
        Plan::updateOrCreate([ 'id' => $activePlan?->id ], [
            'user_id'       => $user->id,
            'package_id'    => $package->id,
            'name'          => $package->name,
            'price'         => $package->price,
            'product_limit' => $package->product_limit,
            'expired_at'    => $expireDate,
            'validity'      => $request->validity,
            'active'        => true,
         ]);
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
        $user->refresh();
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
            'email_verified_at' => $user->email_verified_at == null ? now() : null,
         ]);
        $user->refresh();
        if ($user->email_verified_at != null) {
            $message = __('The user email has been verified!');
        }{
            $message = __('The user email has been unverified!');
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
    public function edit(User $user)
    {
        $packages      = Package::get();
        $activePlan    = $user->activePlan()->first();
        $activePackage = $user->activePackage();
        $packageId     = request()->query('package_id');
        if (!empty($packageId)) {
            $activePackage = Package::find($packageId);
        }
        return view('pages.users.edit', compact('user', 'packages', 'activePlan', 'activePackage'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'email'            => [ 'required', 'lowercase', 'email', 'max:255', "unique:users,email,{$user->id}" ],
            // 'password'         => [ 'required', Rules\Password::defaults() ],
            'first_name'       => [ 'nullable', 'string' ],
            'last_name'        => [ 'nullable', 'string' ],
            'phone'            => [ 'nullable', 'string' ],
            'workplace'        => [ 'nullable', 'string', 'max:40' ],
            'position'         => [ 'nullable', 'string', 'max:40' ],
            'promotional_code' => [ 'nullable', 'string', 'max:40' ],
            'unit'             => "string|nullable",
            'validity'         => "integer|nullable",
         ]);
        $user = tap($user)->update([
            'email'            => $request->email,
            // 'password'          => $request->has('password') ? Hash::make($request->password): $user->password,
            'name'             => $request->first_name . " " . $request->last_name,
            'first_name'       => $request->first_name,
            'last_name'        => $request->last_name,
            'phone'            => $request->phone,
            'workplace'        => $request->workplace,
            'promotional_code' => $request->promotional_code,
         ]);
        $activePlan = $user->activePlan()->first();
        $package    = Package::find($request->package_id);
        $expireDate = $request->validity != null ? now()->add($request->unit, $request->validity) : null;
        Plan::updateOrCreate([ 'id' => $activePlan?->id ], [
            'user_id'       => $user->id,
            'package_id'    => $package->id,
            'name'          => $package->name,
            'price'         => $package->price,
            'product_limit' => $package->product_limit,
            'expired_at'    => $expireDate,
            'validity'      => $request->validity,
            'active'        => true,
         ]);
        notify()->success('Updated Successfully!');
        return back();

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
