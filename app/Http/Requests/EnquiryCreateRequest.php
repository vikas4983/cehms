<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class EnquiryCreateRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'mobile' => ['required', 'digits:10', 'regex:/^[6-9][0-9]{9}$/', 'unique:users,mobile'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Name is required',
            'email.required' => 'Email is required',
            'email.email' => 'Enter valid email',
            'email.unique' => 'Email already exists',
            'mobile.required' => 'Mobile number is required',
            'mobile.digits' => 'Mobile must be 10 digits',
            'mobile.unique' => 'Mobile already exists',
            'mobile.regex' => 'Mobile must start with 6, 7, 8 or 9',
        ];
    }
}
