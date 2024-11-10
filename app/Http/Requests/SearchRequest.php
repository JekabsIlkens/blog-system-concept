<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
{
    public function rules(): array
    {
        return 
        [
            'query' => 
            [
                'required',
                'string',
                'max:255',
                'regex:/^[\p{L} \'-]+$/u',
            ],
        ];
    }

    public function messages()
    {
        return 
        [
            'query.regex' => 'Only letters, spaces, hyphens, and apostrophes.',
        ];
    }
}
