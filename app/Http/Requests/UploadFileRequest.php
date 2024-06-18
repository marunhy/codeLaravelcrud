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
}
