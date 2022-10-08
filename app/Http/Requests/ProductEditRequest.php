<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'description' => ['required', 'string'],
            'product_type_id' => ['required', 'integer'],
            'product_attributes' => ['required', 'array'],
            'product_attributes.*.attribute_id' => ['required', 'integer'],
            'product_attributes.*.attribute_value_id' => ['required', 'integer'],
        ];
    }
}
