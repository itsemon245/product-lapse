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
            'email'      => [ 'sometimes', 'required', 'email', 'unique:users,email', auth()->id() ],
            'first_name' => 'sometimes|required|string|max:255',
            'last_name'  => 'sometimes|required|string|max:255',
            'phone'      => 'sometimes|string|max:20',
            'position'   => 'sometimes|string|max:255|exists:roles,name',
            'task'       => 'sometimes|string|max:255',
            'products'   => 'sometimes|required',
         ];
    }
}
