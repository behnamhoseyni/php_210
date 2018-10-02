<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ManuFacturesRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules()
    {
        return [
            'manufacture_name' => 'required',
            'manufacture_description' => 'required',
            
            //
        ];
    }
}
