<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CertificateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'received_id' => 'required',
            'company_name' => 'sometimes|required',
            'description' => 'sometimes|required',
            'issue_date' => 'sometimes|required',
            'signature' => 'sometimes|required',
        ];
    }
}
