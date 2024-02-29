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
            'name'=> 'array|required',
            'price'=> 'integer|required',
            'product_limit'=> 'nullable',
            'is_limited'=> 'string|nullable',
            'is_popular'=> 'string|nullable',
            'features'=> 'array|required',
            'validity'=> 'integer|required',
            'unit' => 'required|in:day,month,year'
        ];
    }
}
