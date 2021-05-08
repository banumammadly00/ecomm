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
        $price = FormRequest::get('price');
        $images = FormRequest::get('main_image');

        return [

            'name'            => 'required|min:3|max:150',
            'sku_number'      => 'required|numeric|min:8',
            'price'           => 'required|numeric|min:1',
            'discount_price'  => 'numeric|max:'.($price-1),
            'count'           => 'required|integer|min:4',
            'images'          => 'image|mimes:jpeg,png,jpg,svg',
            'images'          =>  $images ? '' : 'required'
          ];
    }

    public function messages()
    {
        $price = FormRequest::get('price');
        return [
            'name.required'          => 'Name can not be empty',
            'sku_number.required'    => 'SKU number can not be empty',
            'price.required'         => 'Product price can not be empty',
            'images.required'        => 'Product image must be at least 1 jpeg, png, jpg, svg format file',
            'discount_price.max'     => 'Discount price can not be equal or greater than price amount('.$price.')'
        ];
    }
}
