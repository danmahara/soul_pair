<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'first_name' => 'required|string|max:255', // required and must be a string
            'last_name' => 'required|string|max:255', // required and must be a string
            'email' => 'required|string|email|max:255|unique:users', // required and must be unique
            'password' => 'required|string|min:6|confirmed', // required and must be confirmed
            'gender' => 'nullable|in:male,female,other', // nullable and must be one of the specified values
            'date_of_birth' => 'nullable|date', // nullable and must be a valid date
            'address' => 'nullable|string|max:255', // nullable and must be a string
            'location' => 'nullable', // nullable, add specific validation if needed
            'bio' => 'nullable|string|max:1000', // nullable and must be a string with max length
            'profile_picture' => 'nullable|mimes:jpeg,jpg,avif|max:2024',
        ];
    }

    // Custom messages (optional)
    public function messages()
    {
        return [
            'first_name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'username.required' => 'Username is required.',
            'email.required' => 'Email is required.',
            'password.required' => 'Password is required.',
            'date_of_birth.date' => 'Date of birth must be a valid date.',
            'bio.max' => 'Bio must not exceed 1000 characters.',
        ];

    }
}
