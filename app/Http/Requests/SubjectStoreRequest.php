<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubjectStoreRequest extends FormRequest
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
            'subject_code' => ['nullable', 'string', 'max:255', 'unique:subjects,subject_code'],
            'name' => ['nullable', 'string', 'max:255'],
            'atukot_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'stream_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'teacher_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'syllabus' => ['nullable', 'string', 'max:255'],
            'notify' => ['nullable'],
            'is_active' => ['nullable'],
        ];
    }
}
