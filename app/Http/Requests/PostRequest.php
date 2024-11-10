<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function rules(): array
    {
        return 
        [
            'title' => 
            [
                'required',
                'string',
                'max:150',
            ],
            'body' => 
            [
                'required',
                'string',
                'max:15000'
            ],
        ];
    }

    public function messages()
    {
        return 
        [
            'title.max' => 'The title should be a brief description of the subject. (Character limit: 150)',
            'body.max' => 'Please split this post into a multiple blog post series. (Character limit: 15000)',
        ];
    }
}
