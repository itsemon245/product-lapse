<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookDemoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'full_name' => ['required', 'string', 'max:255'],
            'official_email' => ['required', 'email', 'unique:demo_requests,official_email', 'max:255'],
            'mobile_number' => ['required', 'string', 'max:255'],
            'company_name' => ['required', 'string', 'max:255'],
        ];
    }
}
