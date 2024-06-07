<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Please enter your email',
            'email.email' => 'Invalid email format',
            'password.required' => 'Please enter your password',
            'password.min' => 'Password must be at least 6 characters long',
        ];
    }
}
