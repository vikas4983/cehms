<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StudentCreateRequest extends FormRequest
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
        $userId = $this->route('student');
       
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', Rule::unique('users', 'email')->ignore($userId)],
            'password' => ['required', 'confirmed'],
            'image' => ['nullable', 'mimes:jpg,jpeg,gif,', 'max:20248'],
            'status' => ['required', 'in:1,0'],
            'father_name' => ['nullable', 'string'],
            'dob' => ['nullable', 'date'],
            'gender' => ['required'],
            'mobile' => ['required', 'numeric', 'regex:/^[6789]\d{9,11}$/'],
            'address' => ['nullable', 'string'],
            'qualification' => ['nullable', 'string'],
            'practitioner_registration' => ['nullable', 'string'],
             '10th_marksheet' => ['nullable', 'file', 'mimes:pdf', 'max:4096'],
            '12th_marksheet' => ['nullable', 'file', 'mimes:pdf', 'max:4096'],
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        return $validator;
    }
}
