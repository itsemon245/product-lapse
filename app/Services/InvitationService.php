<?php
namespace App\Services;

use App\Models\Invitation;
use Illuminate\Support\Str;
use App\Mail\InvitationMail;
use App\Models\InvitationProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\TeamInvitationRequest;


class InvitationService
{
    public function __construct(protected TeamInvitationRequest $request, protected $extraData)
    {
        $this->extraData = $extraData; 
    }

    /**
     * Create a new invitation for user
     *
     * @param TeamInvitationRequest|null $request
     *  @param $extraData
     * @return Invitation
     */
    public static function store(TeamInvitationRequest $request = null, $extraData): Invitation
    {
        // dd($extraData);
        if ($request == null) {
            $request = self::$request;
        }
        $token      = (string) Str::uuid();
        $invitation = Invitation::create([
            'owner_id'   => auth()->user()->id,
            'email'      => $request->email,
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'phone'      => $request->phone,
            'role'   => $request->role,
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
        $status = Mail::to($request->email)->send(new InvitationMail($invitation, $extraData));
        return $invitation;
    }

}
