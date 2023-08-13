<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeeStoreRequest extends FormRequest
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
            'atukot_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'name' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'amount' => ['nullable', 'numeric', 'between:-99999999.99,99999999.99'],
            'is_active' => ['nullable'],
        ];
    }
}
