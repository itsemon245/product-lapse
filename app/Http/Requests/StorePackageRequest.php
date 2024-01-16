<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePackageRequest extends FormRequest
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
            'name' => 'sometimes | required',
            'price' => 'sometimes | required',
            'monthly_rate' => 'sometimes | required',
            'annual_rate' => 'sometimes | required',
            'subscription_type' => 'sometimes | required',
            'features' => 'sometimes | required',
            'product_limit' => 'sometimes | required',
            'validity' => 'sometimes | required',
            'has_limited_features' => 'sometimes | required',
            'is_popular' => 'sometimes | required',

        ];
    }
}
