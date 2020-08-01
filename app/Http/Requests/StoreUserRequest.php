<?php

namespace App\Http\Requests;

use App\Models\User;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreUserRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('user_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'name'     => [
                [
                    'string',
                    'required',
                ],
            ],
            'email'    => [
                [
                    'required',
                    'unique:users',
                ],
            ],
            'password' => [
                [
                    'required',
                ],
            ],
            'roles.*'  => [
                [
                    'integer',
                ],
            ],
            'roles'    => [
                [
                    'required',
                    'array',
                ],
            ],
            'phone'    => [
                [
                    'string',
                    'min:10',
                    'max:10',
                    'required',
                    'unique:users',
                ],
            ],
        ];
    }
}