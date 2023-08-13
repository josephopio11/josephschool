<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HostelUpdateRequest extends FormRequest
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
            'name' => ['nullable', 'string', 'max:128'],
            'hostel_type' => ['nullable', 'string', 'max:128'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:15'],
            'email' => ['nullable', 'email', 'max:255'],
            'capacity' => ['nullable', 'integer'],
            'description' => ['nullable', 'string'],
        ];
    }
}
