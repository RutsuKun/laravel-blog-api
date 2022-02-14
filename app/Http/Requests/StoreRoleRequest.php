<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreRoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:roles,title,' . request()->input('title'),
            ],
            'permissions.*' => [
                'integer',
            ],
            'permissions' => [
                'array',
            ],
        ];
    }

    public function authorize(): bool
    {
        return Gate::allows('roles:access');
    }
}
