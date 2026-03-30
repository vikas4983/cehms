<?php

namespace App\Http\Requests;

use Illuminate\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BannerCreateRequest extends FormRequest
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
            'banner' => ['required', 'file', 'mimes:jpg,jpeg,png,gif,webp', 'max:2048'],
            'order' => ['nullable', 'numeric', Rule::unique('banners', 'order')->ignore($this->route('banner'))],
            'status' => ['required', 'in:1,0'],
        ];
    }
}
