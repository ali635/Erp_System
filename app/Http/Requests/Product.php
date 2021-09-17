<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Product extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Product_name' => 'required|string',
            'Product_number' => 'nullable|numeric',
            'description' => 'required|string',
            'position' => 'nullable|string',
            'cost' => 'required|numeric',
            'weight' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'less_quantity' => 'required|numeric',
            'Factory_No' => 'nullable|numeric',
            'photo' => 'nullable',
            'store_id' => 'required|numeric',
        ];
    }
}
