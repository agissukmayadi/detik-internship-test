<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;

class BookRequest extends FormRequest
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
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $currentYear = Carbon::now()->year;
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'isbn' => ['required', 'string'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'author' => ['required', 'string'],
            'publisher' => ['required', 'string'],
            'publication_year' => ['required', 'integer', 'min:1800', 'max:' . $currentYear],
            'stock' => ['required', 'integer', 'min:1'],
            'file' => ['file', 'mimes:pdf', 'max:10240'],
            'image' => ['file', 'mimes:jpg,jpeg,png', 'max:2048'],
        ];
    }
}