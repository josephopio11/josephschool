<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssessmentTypeStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'subject_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'teacher_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'atukot_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'name' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable'],
        ];
    }
}
