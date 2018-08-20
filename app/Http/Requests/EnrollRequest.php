<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollRequest extends FormRequest
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
             'to' => 'required|max:255',
            'file' => 'required|mimes:jpeg,png',
            'subject' => 'required|min:2'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You need to fill video name !',
            'file.required' => 'You need to upload image',
            'file.mimes' => 'The Upload file must be image (jpeg or png) ! '
        ];
    }
}
