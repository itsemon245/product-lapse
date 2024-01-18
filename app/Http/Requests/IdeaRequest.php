<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IdeaRequest extends FormRequest
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
            'owner' => 'sometimes|required',
            'priority' => 'sometimes|required',
            'details' => 'sometimes|required',
            'requirements' => 'sometimes|required',
            
        ];
    }
}
