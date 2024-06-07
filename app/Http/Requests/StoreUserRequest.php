<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|email|unique:users|regex:/^[\w\.-]+@[\w\.-]+\.[a-zA-Z]{2,}$/',
            'password' => 'required|min:6',
            'gender' => 'required',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your name.',
            'name.string' => 'Name must be a string.',
            'name.min' => 'Name must be at least :min characters.',
            'name.max' => 'Name must not exceed :max characters.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Invalid email address format.',
            'email.unique' => 'Email address is already in use.',
            'email.regex' => 'Invalid email address format.',
            'password.required' => 'Please enter your password.',
            'password.min' => 'Password must be at least :min characters.',
            'gender.required' => 'Please select your gender.',
            'profile_image.required' => 'Please select a profile image.',
            'profile_image.image' => 'File must be an image.',
            'profile_image.mimes' => 'Image must have one of the following formats: :values.',
            'profile_image.max' => 'Image must not be larger than :max KB.',
        ];
    }


}
