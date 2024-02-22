<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required',
            'phone' => 'sometimes|required',
            'type' => 'sometimes|required',
            'email' => 'sometimes|required',
            'street' => 'sometimes|required',
            'city' => 'sometimes|required',
            'state' => 'sometimes|required',
            'country' => 'sometimes|required',
            'zip' => 'sometimes|required',
            'ip' => 'sometimes|required',
        ];
    }
}
