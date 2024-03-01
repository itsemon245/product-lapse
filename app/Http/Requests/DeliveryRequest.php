<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeliveryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'username' => 'sometimes|required|string|max:255',
            'items' => 'sometimes|required|string|max:255',
            'link' => 'sometimes|required|string|max:255',
            'password' => 'sometimes|required|string|max:255',
            'administrator' => 'required|string|max:255',
            'add_attachments[]' => 'sometimes|required',
        ];
    }
}
