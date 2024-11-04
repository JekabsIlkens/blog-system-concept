<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'max:250',
            ],
            'body' => [
                'required',
                'string',
                'max:10000'
            ],
        ];
    }

    public function messages()
    {
        return [
            'title.max' => 'The title should be a brief description of the subject. (Character limit: 50)',
            'body.max' => 'Please split this post into a multiple blog post series. (Character limit: 10000)',
        ];
    }
}
