<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HostelBedUpdateRequest extends FormRequest
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
            'bed_number' => ['nullable', 'string', 'max:128'],
            'room_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'price' => ['nullable', 'integer'],
            'description' => ['nullable', 'string'],
        ];
    }
}
