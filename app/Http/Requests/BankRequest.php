<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'sender_name' => ['required', 'string', 'max:255'],
            'sent_date' => ['required', 'date'],
            'sent_time' => ['nullable', 'string', 'max:255'],
            'attachment' => ['file', 'mimetypes:image/*,application/pdf'],
            'payment_receipt' => ['nullable'],
        ];
    }
}
