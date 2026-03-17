<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MedicineCreateRequest extends FormRequest
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
        $medicineId = $this->route('medicine');
        return [
            'name' => ['required', 'string', Rule::unique('medicines', 'name')->ignore($medicineId)],
            'code' => ['required', 'string', Rule::unique('medicines', 'code')->ignore($medicineId)],
            'status' => ['required', 'in:1,0'],
        ];
    }
}
