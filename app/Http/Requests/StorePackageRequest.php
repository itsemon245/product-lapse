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

        if(request()->isMethod('post')){
            $role = 'required';
        }elseif(request()->isMethod('post')){
            $role= 'sometimes';
        }
        return [
            'name' => [$role, 'max:30'],
            'price' => [$role, 'numeric'],
            'monthly_rate' => [$role, 'numeric'],
            'annual_rate' => [$role, 'numeric'],
            'subscription_type' => [$role, 'numeric'],
            'features' => [$role],
            'product_limit' => [$role],
            'validity' => [$role],
            'has_limited_features' => [$role],
            'is_popular' => [$role],

        ];
    }
}
