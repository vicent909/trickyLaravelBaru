<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class VariantRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'products_id' => 'required|integer|exists:products,id',
            'sizes_id' => 'required|integer|exists:sizes,id',
            'colors_id' => 'required|integer|exists:colors,id',
            'quantity' => 'required|integer',
            'price' => 'required|integer',
        ];
    }
}
