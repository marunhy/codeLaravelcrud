<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendMailRegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users|regex:/^[\w\.-]+@[\w\.-]+\.[a-zA-Z]{2,}$/',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Please enter your email',
            'email.email' => 'Invalid email format',
            'email.unique' => 'The email you entered is already in use',
            'email.regex' => 'Please enter a valid email address',
        ];
    }
}
