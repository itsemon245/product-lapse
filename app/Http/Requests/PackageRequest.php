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
            'info_en' => 'sometimes|required',
            'info_ar' => 'sometimes|required',
            // 'package' => 'required',
            'price' => 'required',
            'money_en' => 'sometimes|required',
            'money_ar' => 'sometimes|required',
            'feature_one_en' => 'sometimes|required',
            'feature_one_ar' => 'sometimes|required',
            'feature_two_en' => 'sometimes|required',
            'feature_two_ar' => 'sometimes|required',
            'feature_three_en' => 'sometimes|required',
            'feature_three_ar' => 'sometimes|required',
            
        ];
    }
}
