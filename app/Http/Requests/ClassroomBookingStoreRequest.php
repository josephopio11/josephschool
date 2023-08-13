<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomBookingStoreRequest extends FormRequest
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
            'classroom_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'atukot_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'date' => ['nullable', 'date'],
            'start_time' => ['nullable'],
            'end_time' => ['nullable'],
            'is_active' => ['nullable'],
        ];
    }
}
