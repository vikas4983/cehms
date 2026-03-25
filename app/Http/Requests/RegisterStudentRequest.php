<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterStudentRequest extends FormRequest
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
        $id = auth()->id();
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($id)],
            'password' => ['required', 'confirmed', 'min:6'],
            'gender' => ['required', 'string', 'in:male,female'],
            'dob' => ['required', 'date'],
            'mobile' => ['required', 'numeric', 'regex:/^[6789]\d{9,11}$/', Rule::unique('users', 'mobile')->ignore($id)],
            'address' => ['nullable', 'string'],
            'qualification' => ['nullable', 'string'],
            'father_name' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
            '10th_marksheet' => ['nullable', 'file', 'mimes:pdf', 'max:4096'],
            '12th_marksheet' => ['nullable', 'file', 'mimes:pdf', 'max:4096'],
        ];
    }
}
