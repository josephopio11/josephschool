<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaffStoreRequest extends FormRequest
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
            'salutation' => ['nullable', 'string', 'max:10'],
            'first_name' => ['nullable', 'string', 'max:50'],
            'middle_name' => ['nullable', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'gender' => ['nullable', 'string', 'max:10'],
            'date_of_birth' => ['nullable', 'date'],
            'address' => ['nullable', 'string'],
            'phone' => ['nullable', 'string', 'max:15'],
            'alternate_phone' => ['nullable', 'string', 'max:15'],
            'email' => ['nullable', 'email', 'max:255'],
            'photo' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable'],
            'last_active' => ['nullable'],
            'staff_role_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'password' => ['nullable', 'password', 'max:255'],
        ];
    }
}
