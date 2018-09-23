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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *ssss
     * @return array
     */
    public function rules()
    {
        return [
            'slider_title' => 'Required',
            'slider_description' => 'Required',
            'slider_off_image' => 'required|mimes:jpeg,bmp,png|max:200',
            'slider_button_lable' => 'Required',
            'slider_image' => 'required|mimes:jpeg,bmp,png|max:200',
            'slider_link' => 'Required',
        ];
    }
}
