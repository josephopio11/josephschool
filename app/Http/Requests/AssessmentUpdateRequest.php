<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AssessmentUpdateRequest extends FormRequest
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
            'assessment_type_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'atukot_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'assessment_date' => ['nullable', 'date'],
            'stream_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'session_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'pass_mark' => ['nullable', 'integer'],
            'full_mark' => ['nullable', 'integer'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'comments' => ['nullable', 'string'],
            'assessment_file' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable'],
        ];
    }
}
