<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'description' => 'required|string',
            'dealer' => 'string',
            'price' => 'required|numeric',
            'buying_price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'status' => 'required|string',
            'category' => 'required|string',
            'discount' => 'required|string',
        ];
    }
}
