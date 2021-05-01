<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsValidationRequest extends FormRequest
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

            'name'            => 'required|min:3|max:150',
            'sku_number'      => 'required|min:8',
            'amount'          => 'required|integer|min:1',
            'discount_amount' => 'min:1',
            'count'           => 'required|integer|min:1',
            //'images'          => 'required|min:5'
          ];
    }

    public function messages()
    {
        return [
            'name.required'           => 'Name can not be empty',
            'sku_number.required'     => 'SKU number can not be empty',
            'amount.required'         => 'Product price can not be empty'
        ];
    }
}
