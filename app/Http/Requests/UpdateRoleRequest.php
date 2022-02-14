<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateRoleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:roles,title,' . request()->route('role')->id,
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions' => [
                'array',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('roles:access');
    }
}
