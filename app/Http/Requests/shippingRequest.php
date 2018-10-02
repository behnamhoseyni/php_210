<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class shippingRequest extends FormRequest
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
        'shipping_name'   => 'required|min:8|max:100',
        'shipping_address'=> 'required',
        'shipping_email'  => 'email',
        'shipping_tel'    => 'required|regex:/(09)[0-9]{9}/'
        ];
    }
}
