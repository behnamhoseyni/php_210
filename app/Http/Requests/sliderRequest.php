<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class sliderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *ssss
     * @return array
     */
    public function rules()
    {
        return [
            'slider_title' => 'req'
            'slider_description'
            'slider_off_image'
            'slider_button_lable'
            'slider_image'
            'slider_link'
        ];
    }
}
