<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }

    public function rules(): array
    {
        return 
        [
            'comment' => 
            [
                'required',
                'string',
                'max:2000'
            ],
        ];
    }

    public function messages()
    {
        return 
        [
            'comment.max' => 'Please split this into multiple comments. (Character limit: 2000)',
        ];
    }
}
