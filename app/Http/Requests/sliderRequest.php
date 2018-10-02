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
<<<<<<< HEAD
        return true;
=======
        return false;
>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd
    }

    /**
     * Get the validation rules that apply to the request.
     *ssss
     * @return array
     */
    public function rules()
    {
        return [
<<<<<<< HEAD
            'slider_title' => 'Required',
            'slider_description' => 'Required',
            'slider_off_image' => 'required|mimes:jpeg,bmp,png|max:200',
            'slider_button_lable' => 'Required',
            'slider_image' => 'required|mimes:jpeg,bmp,png|max:200',
            'slider_link' => 'Required',
=======
            'slider_title' => 'req'
            'slider_description'
            'slider_off_image'
            'slider_button_lable'
            'slider_image'
            'slider_link'
>>>>>>> 888e1c0dfa0ed95ffd37ced857bda0f4ae3bf8fd
        ];
    }
}
