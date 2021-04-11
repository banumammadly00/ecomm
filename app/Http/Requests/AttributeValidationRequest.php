<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeValidationRequest extends FormRequest
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

            'name'            => 'required|min:3|max:50',
            'slug'            => 'required|min:3|max:255',
            'values'          => 'required|min:3',
            'attribute_type'  => 'required|min:3|max:50'
        ];
    }

    public function messages()
    {
        return [
            'name.required'           => 'Name can not be empty',
            'slug.required'           => 'Slug can not be empty',
            'values.required'         => 'Values can not be empty',
            'attribute_type.required' =>  'Attribute type can not be empty'
        ];
    }
}
