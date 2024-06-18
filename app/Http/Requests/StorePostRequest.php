<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|max:255',
            'content' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please',
            'content.required' => 'content',
            'images.required' => 'Please select a profile image.',
            'images.image' => 'File must be an image.',
            'images.mimes' => 'Image must have one of the following formats: :values.',
            'images.max' => 'Image must not be larger than :max KB.',
        ];
    }
}
