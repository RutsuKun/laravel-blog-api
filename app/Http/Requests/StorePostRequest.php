<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'string',
                'unique:roles,title,' . request()->input('title'),
            ],
            'content' => [
                'required',
                'string',
            ],
        ];
    }

    public function authorize(): bool
    {
        return Gate::allows('posts:access');
    }
}
