<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InstallRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'DB_DATABASE' => ['required', 'string'],
            'DB_USERNAME' => ['required', 'string'],
            'DB_PASSWORD' => ['required', 'string'],
        ];
    }
}
