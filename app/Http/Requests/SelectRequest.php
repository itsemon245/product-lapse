<?php

namespace App\Http\Requests;

use App\Enums\Feature;
use App\Enums\SelectType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SelectRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_en' => 'sometimes|required|string|max:255',
            'name_ar' => 'sometimes|required|string|max:255',
            'text_color' => 'sometimes|required|string|max:255',
            'model_type' => ['sometimes', 'required', Rule::enum(Feature::class)],
            'type' => ['sometimes', 'required', Rule::enum(SelectType::class)],
        ];
    }
}
