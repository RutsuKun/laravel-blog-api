<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdatePostRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => [
                'required',
                'string',
                'unique:posts,title,' . request()->route('post')->id,
            ],
            'slug' => [
                'required',
                'string',
                'unique:posts,slug,' . request()->route('post')->id,
            ],
            'content' => [
                'required',
                'string',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('posts:access');
    }
}
