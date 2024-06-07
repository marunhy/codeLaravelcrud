<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'password' => 'required|min:6',
            'gender' => 'required|boolean',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'profile_image_url' => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.min' => 'Name must be at least :min characters.',
            'name.max' => 'Name must not exceed :max characters.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Invalid email address format.',
            'email.unique' => 'Email address is already in use.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least :min characters.',
            'gender.required' => 'Please select your gender.',
            'gender.boolean' => 'Invalid gender value.',
            'profile_image.image' => 'File must be an image.',
            'profile_image.mimes' => 'Image must have one of the following formats: :values.',
            'profile_image.max' => 'Image must not be larger than :max KB.',
        ];
    }
}
