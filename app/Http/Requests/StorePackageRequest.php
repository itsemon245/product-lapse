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
            'name' => 'sometimes',
            'price' => 'sometimes',
            'monthly_rate' => 'sometimes',
            'annual_rate' => 'sometimes',
            'subscription_type' => 'sometimes',
            'features' => 'sometimes',
            'product_limit' => 'sometimes',
            'validity' => 'sometimes',
            'has_limited_features' => 'sometimes',
            'is_popular' => 'sometimes',

        ];
    }
}
