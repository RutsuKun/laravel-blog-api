<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdatePermissionRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:permissions,title,' . request()->route('permission')->id,
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'array',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('permissions:access');
    }
}
