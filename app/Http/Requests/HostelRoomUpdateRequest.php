<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HostelRoomUpdateRequest extends FormRequest
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
            'room_number' => ['nullable', 'string', 'max:128'],
            'hostel_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'capacity' => ['nullable', 'integer'],
            'room_type_id' => ['nullable', 'integer', 'exists:foreigns,id'],
        ];
    }
}
