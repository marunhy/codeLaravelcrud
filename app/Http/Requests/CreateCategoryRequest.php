<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'categories_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name is required.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'categories_image.image' => 'The file must be an image.',
            'categories_image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'categories_image.max' => 'The image may not be greater than 2048 kilobytes.',
        ];
    }


}
