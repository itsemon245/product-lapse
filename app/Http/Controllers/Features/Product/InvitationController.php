<?php

namespace App\Http\Controllers\Features\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamInvitationRequest;
use App\Models\Invitation;
use App\Models\Product;
use App\Models\Scopes\OwnerScope;
use App\Models\User;
use App\Services\InvitationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invitations = Invitation::where('owner_id', auth()->user()->id)->get();

        return view('features.product.invitation.index', compact('invitations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::get();
        $roles    = Role::where('name', '!=', 'admin')
            ->where('name', '!=', 'account holder')
            ->get();
        $invitation = null;

        return view('features.product.invitation.create', compact('products', 'roles', 'invitation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamInvitationRequest $request)
    {
        $invitation = InvitationService::store($request);
        notify()->success(__('notify/success.invitation_sent'));

        return redirect()->route('invitation.index');
    }

    /**
     * Display the specified resource.
     */
    public function edit(Invitation $invitation)
    {
        $products = Product::get();
        $roles    = Role::where('name', '!=', 'admin')
            ->where('name', '!=', 'account holder')
            ->get();

        return view('features.product.invitation.create', compact('products', 'roles', 'invitation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function accept($token)
    {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        $invitation = Invitation::withoutGlobalScope(OwnerScope::class)->where('token', $token)->first();
        $user       = User::where('email', $invitation->email)->first();
        $id         = base64_encode($invitation->id);

        if ($user) {
            if ($user->owner_id != $invitation->owner_id) {
                $newUser = User::create([
                    'name'              => $invitation->first_name . " " . $invitation->last_name,
                    'email_verified_at' => now(),
                    'password'          => Hash::make(Str::random()),
                    'first_name'        => $invitation->first_name,
                    'last_name'         => $invitation->last_name,
                    'phone'             => $invitation->phone,
                    'position'          => $invitation->role,
                    'owner_id'          => $invitation->owner_id,
                    'main_account_id'   => $user->main_account_id ?? $user->id,
                    'type'              => 'member',
                 ]);
                $this->assignToUser($invitation, $newUser);
                Auth::login($newUser, true);
                notify()->success(trans('A new workspace has been created!'));
                return to_route('dashboard');
            }
            Auth::login($user);
            $this->assignToUser($invitation, $user);
            notify()->success('You have already accepted the invitation!');

            return redirect(route('dashboard'));
        }
        if ($invitation == null) {
            notify()->error('Invitation expired or invalid token!');

            return redirect()->route('home');
        }

        return view('features.product.invitation.create-password', compact('id'));
    }

    public function passwordStore(Request $request, $id)
    {

        $request->validate([
            'password' => 'required|string|min:6|same:confirm_password',
         ]);
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        $id = base64_decode($id);

        $invitation = Invitation::withoutGlobalScope(OwnerScope::class)->find($id);
        // dd($invitation);
        if ($invitation == null) {
            notify()->error('Invitation expired or invalid token!');

            return redirect()->route('home');
        }
        $user = User::create([
            'name'              => $invitation->first_name . " " . $invitation->last_name,
            'email'             => $invitation->email,
            'email_verified_at' => now(),
            'password'          => Hash::make($request->password),
            'first_name'        => $invitation->first_name,
            'last_name'         => $invitation->last_name,
            'phone'             => $invitation->phone,
            'position'          => $invitation->role,
            'owner_id'          => $invitation->owner_id,
            'type'              => 'member',
         ]);
        $this->assignToUser($invitation, $user);
        Auth::login($user, true);

        return redirect()->route('login')->with('success', 'Password created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamInvitationRequest $request, Invitation $invitation)
    {
        $invitation = InvitationService::update($request, $invitation);
        notify()->success(__('notify/success.update'));

        return redirect()->route('invitation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id         = base64_decode($id);
        $invitation = Invitation::find($id);
        if ($invitation == null || $invitation->owner_id != auth()->user()->id) {
            return redirect()->back();
        }

        $invitation->delete();

        return redirect()->route('invitation.index')->with('success', 'Invitation deleted successfully');
    }

    protected function assignToUser(Invitation $invitation, User $user): void
    {
        if ($invitation->products) {
            $user->myProducts()->detach();
            foreach ($invitation->products as $product) {
                $user->myProducts()->attach($product->id);
                $invitation->products()->updateExistingPivot($product->id, [ 'is_accepted' => true ]);
            }
        }

        if ($invitation->tasks) {
            $user->tasks()->detach();
            foreach ($invitation->tasks as $task) {
                $user->tasks()->attach($task);
            }
        }
        $user->owner_id = $invitation->owner_id;
        $user->type     = 'member';
        $user->roles()->detach();
        if ($invitation->role) {
            $user->assignRole($invitation->role);
        }
        $invitation->accepted_at = now();
        $invitation->saveQuietly();
        $user->saveQuietly();

    }
}
