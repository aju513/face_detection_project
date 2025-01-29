<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255', // Ensure name is a string and has a max length
            'email' => 'required|email|unique:users,email', // Ensure the email is unique in the users table
            'password' => 'required|string|min:8', // Password should have a minimum length and confirmation
            'photo' => 'required|mimes:jpg,jpeg,png,gif,webp' // Ensure photo is an image with size restriction
            // 'photo' => 'required'
        ];
    }
}
