<?php
namespace App\Services;

use App\Http\Requests\TeamInvitationRequest;
use App\Mail\InvitationMail;
use App\Mail\Test;
use App\Models\Invitation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class InvitationService
{
    public function __construct(protected TeamInvitationRequest $request)
    {
    }

    /**
     * Create a new invitation for user
     *
     * @param TeamInvitationRequest|null $request
     *  @param $extraData
     * @return Invitation
     */
    public static function store(TeamInvitationRequest $request = null): Invitation
    {
        // dd($extraData);
        if ($request == null) {
            $request = self::$request;
        }
        $token      = (string) Str::uuid();
        $invitation = Invitation::updateOrCreate(['email' => $request->email],[
            'owner_id'   => auth()->user()->type == 'admin' ? auth()->id() : auth()->user()?->owner_id,
            'email'      => $request->email,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone'      => $request->phone,
            'role'       => $request->role,
            'tasks'      => $request->tasks,
            'token'      => $token,
         ]);
        // Create invitation products for every product
        if ($request->has('products')) {
            foreach ($request->products as $product) {
                DB::table('invitation_products')->insert([
                    'invitation_id' => $invitation->id,
                    'product_id'    => $product,
                 ]);
            }
        }
        $status = Mail::to($request->email)->send(new InvitationMail($invitation));
        return $invitation;
    }
    /**
     * Create a new invitation for user
     *
     * @param TeamInvitationRequest|null $request
     * @param Invitation $invitation
     * @return Invitation
     */
    public static function update(TeamInvitationRequest $request = null, Invitation $invitation): Invitation
    {
        if ($request == null) {
            $request = self::$request;
        }
        $token      = $request->boolean('update_token') ? (string) Str::uuid() : $invitation->token;
        $invitation = tap($invitation)->update([
            'email'      => $request->email,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone'      => $request->phone,
            'role'       => $request->role,
            'tasks'      => $request->tasks,
            'token'      => $token,
         ]);
         // Create invitation products for every product
         if ($request->has('products')) {
            $invitation->products()->delete();
            foreach ($request->products as $product) {
                DB::table('invitation_products')->insert([
                    'invitation_id' => $invitation->id,
                    'product_id'    => $product,
                 ]);
            }
        }
        if ($request->boolean('resend_invitation')) {
            $status = Mail::to($invitation->email)->send(new InvitationMail($invitation));
        }
        return $invitation;
    }

}
