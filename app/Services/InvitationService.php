<?php
namespace App\Services;

use App\Models\Invitation;
use Illuminate\Support\Str;
use App\Mail\InvitationMail;
use App\Models\InvitationProduct;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\Feature\TeamInvitationRequest;

class InvitationService
{
    public function __construct(protected TeamInvitationRequest $request)
    {
    }

    /**
     * Create a new invitation for user
     *
     * @param TeamInvitationRequest|null $request
     * @return Invitation
     */
    public static function store(TeamInvitationRequest $request = null): Invitation
    {
        if ($request = null) {
            $request = self::$request;
        }
        $token      = (string) Str::uuid();
        $invitation = Invitation::create([
            'owner_id'   => auth()->user()->id,
            'email'      => $request->email,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone'      => $request->phone,
            'position'   => $request->position,
            'token'      => $token,
         ]);
        // Create invitation products for every product
        foreach ($request->products as $product) {
            InvitationProduct::create([
                'invitation_id' => $invitation->id,
                'product_id'    => $product,
             ]);
        }
        $status = Mail::to($request->email)->send(new InvitationMail($invitation));
        return $invitation;
    }

}
