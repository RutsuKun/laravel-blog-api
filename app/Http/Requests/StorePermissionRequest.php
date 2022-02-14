<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePermissionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => [
                'string',
                'required',
                'unique:permissions,title,' . request()->input('title'),
            ],
            'roles.*' => [
                'integer',
            ],
            'roles' => [
                'array',
            ],
        ];
    }

    public function authorize(): bool
    {
        return Gate::allows('permissions:access');
    }
}
