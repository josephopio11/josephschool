<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClassroomStoreRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:255'],
            'room_number' => ['nullable', 'string', 'max:255'],
            'capacity' => ['nullable', 'integer'],
            'description' => ['nullable', 'string'],
            'is_active' => ['nullable'],
        ];
    }
}
