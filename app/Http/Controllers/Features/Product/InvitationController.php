<?php

namespace App\Http\Controllers\Features\Product;

use App\Models\User;
use App\Models\Invitation;
use App\Models\ProductUser;
use App\Mail\InvitationMail;
use Illuminate\Http\Request;
use App\Models\InvitationProduct;
use App\Services\InvitationService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\TeamInvitationRequest;

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
        $products = auth()->user()->products;

        return view('features.product.invitation.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(TeamInvitationRequest $request)
    {
        $service = new InvitationService($request);
        $invitation = $service->store();
        return redirect()->route('invitation.index')->with('success', 'Invitation sent successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invitation $invitation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function accept($token)
    {
        $invitation = Invitation::where('token', $token)->first();
        if ($invitation == null) {
            return redirect()->back();
        }

        $invitation->accepted_at = now();
        $invitation->save();

        $id = base64_encode($invitation->id);

        return view('features.product.invitation.create-password', compact('id'));
    }

    public function passwordStore(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
         ]);

        $id = base64_decode($request->id);

        $invitation = Invitation::find($id);

        if ($invitation == null) {
            return redirect()->route('login')->with('success', 'Something went wrong');
        }

        $existingUser = User::where('email', $invitation->email)->first();

        if ($existingUser) {
            return redirect()->route('login')->with('success', 'User with this email already exists');
        } else {

            $user = User::create([
                'role_id'    => $invitation->role_id,
                'email'      => $invitation->email,
                'password'   => Hash::make($request->password),
                'first_name' => $invitation->first_name,
                'last_name'  => $invitation->last_name,
                'phone'      => $invitation->phone,
                'position'   => $invitation->position,
             ]);

            foreach ($invitation->products as $product) {
                if ($product->is_accepted == false) {
                    InvitationProduct::where('product_id', $product->id)->update([ 'is_accepted' => true ]);

                    ProductUser::create([
                        'product_id' => $product->id,
                        'user_id'    => $user->id,
                     ]);
                }

            }
        }

        return redirect()->route('login')->with('success', 'Password created successfully');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
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
}
