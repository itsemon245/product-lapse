<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:255',
            'status' => 'sometimes|required',
            'category' => 'sometimes|required',
            'details' => 'sometimes|required|string',
            'steps' => 'sometimes|required|string',
            'starting_date' => 'sometimes|required|date',
            'ending_date' => 'sometimes|required|date|after_or_equal:starting_date',
            'administrator' => 'sometimes|required|string|max:255',
        ];
    }
}
