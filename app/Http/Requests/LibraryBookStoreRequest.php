<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LibraryBookStoreRequest extends FormRequest
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
            'isbn' => ['nullable', 'string', 'max:255'],
            'title' => ['nullable', 'string', 'max:255'],
            'author' => ['nullable', 'string', 'max:255'],
            'publisher' => ['nullable', 'string', 'max:255'],
            'edition' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'string', 'max:255'],
            'pages' => ['nullable', 'string', 'max:255'],
            'copies' => ['nullable', 'integer'],
            'price' => ['nullable', 'numeric', 'between:-99999999.99,99999999.99'],
            'category' => ['nullable', 'string', 'max:255'],
            'rack' => ['nullable', 'string', 'max:255'],
            'is_active' => ['nullable'],
        ];
    }
}
