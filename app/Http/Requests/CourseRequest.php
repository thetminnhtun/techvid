<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
            'name' => 'required|min:5|max:255',
            'file' => 'required|mimetypes:video/mp4'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'You need to fill course title !',
            'name.min' => 'Course title must be at least 5 characters',
            'file.required'  => 'You need to upload a video !',
            'file.mimetypes' => 'The video file must be mp4 ! '
        ];
    }
}
