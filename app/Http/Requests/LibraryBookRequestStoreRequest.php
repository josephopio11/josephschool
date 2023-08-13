<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryBookRequestStoreRequest extends FormRequest
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
            'student_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'book_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'request_date' => ['nullable', 'date'],
            'is_active' => ['nullable'],
        ];
    }
}
