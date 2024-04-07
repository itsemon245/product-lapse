<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamInvitationRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'      => [ 'sometimes', 'required', 'email'],
            'first_name' => 'sometimes|required|string|max:255',
            'last_name'  => 'sometimes|required|string|max:255',
            'phone'      => 'sometimes|required|string|max:20',
            'role'   => 'required|string|max:255|exists:roles,name',
            'task'       => 'sometimes|required|string|max:255',
            'products'   => 'required',
            'update_token' => 'sometimes',
            'resend_invitation'=> 'sometimes'
         ];
    }
}
