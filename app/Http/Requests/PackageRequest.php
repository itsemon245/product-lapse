<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PackageRequest extends FormRequest
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
            'name_en' => 'required',
            'name_ar' => 'required',
            'price' => 'required|numeric',
            'feature_en' => 'required',
            'feature_ar' => 'required',
            'product_limit_en' => 'required',
            'product_limit_ar' => 'required',
            'validity_en' => 'nullable',
            'validity_ar' => 'nullable',
        ];
    }
}
