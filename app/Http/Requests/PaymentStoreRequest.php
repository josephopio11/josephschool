<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentStoreRequest extends FormRequest
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
            'payment_type_id' => ['nullable', 'integer', 'exists:foreigns,id'],
            'amount' => ['nullable', 'numeric', 'between:-99999999.99,99999999.99'],
            'date' => ['nullable', 'date'],
            'is_active' => ['nullable'],
        ];
    }
}
