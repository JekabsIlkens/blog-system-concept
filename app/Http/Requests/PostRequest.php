<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return 
        [
            'title' => 
            [
                'required',
                'string',
                'max:300',
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
            'title.max' => 'The title should be a brief description of the subject. (Character limit: 50)',
            'body.max' => 'Please split this post into a multiple blog post series. (Character limit: 15000)',
        ];
    }
}
