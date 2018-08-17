<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
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
            'name' => 'required|max:255',
            'file' => 'required|mimetypes:video/mp4'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You need to fill video name !',
            'file.required'  => 'You need to upload a video !',
            'file.mimetypes' => 'The Video file must be mp4 ! '
        ];
    }
}
