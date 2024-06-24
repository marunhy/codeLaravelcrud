<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadFileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'upload' => 'required|file|mimes:jpg,jpeg,png,gif|max:2048', // Điều kiện validate file
        ];
    }

    public function messages()
    {
        return [
            'upload.required' => 'The file upload is required.',
            'upload.file' => 'The upload must be a file.',
            'upload.mimes' => 'The file must be of type: jpg, jpeg, png, gif.',
            'upload.max' => 'The file may not be greater than 2048 kilobytes.',
        ];
    }
}
