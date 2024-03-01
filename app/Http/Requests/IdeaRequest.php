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
            'name'         => 'sometimes|required|max:200',
            'owner'        => 'sometimes|required|max:200',
            'stage'        => 'required',
            'priority'     => 'required',
            'details'      => 'sometimes|required',
            'requirements' => 'sometimes|required',
         ];
    }
}
