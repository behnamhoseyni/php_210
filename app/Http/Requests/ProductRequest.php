<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
             'product_name' => 'required|min:8|max:100',
            'product_short_description' => 'required|min:10',
            'product_long_description' => 'required|min:10',
            'product_price' => 'required|numeric',
            'product_image' => 'required|mimes:jpeg,bmp,png|max:200',
            'product_color' => 'required'

        ];
    }
}
