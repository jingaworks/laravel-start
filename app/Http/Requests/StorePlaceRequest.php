<?php

namespace App\Http\Requests;

use App\Models\Place;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePlaceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('place_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'denloc'  => [
                [
                    'string',
                    'required',
                ],
            ],
            'codp'    => [
                [
                    'string',
                    'required',
                ],
            ],
            'sirsup'  => [
                [
                    'string',
                    'required',
                ],
            ],
            'tip'     => [
                [
                    'required',
                    'integer',
                ],
            ],
            'zona'    => [
                [
                    'required',
                    'integer',
                ],
            ],
            'niv'     => [
                [
                    'required',
                    'integer',
                ],
            ],
            'med'     => [
                [
                    'required',
                    'integer',
                ],
            ],
            'regiune' => [
                [
                    'required',
                    'integer',
                ],
            ],
            'fsj'     => [
                [
                    'nullable',
                    'integer',
                ],
            ],
            'FS2'    => [
                [
                    'string',
                    'nullable',
                ],
            ],
            'FS3'    => [
                [
                    'string',
                    'nullable',
                ],
            ],
            'fsl'     => [
                [
                    'nullable',
                    'integer',
                ],
            ],
            'rang'    => [
                [
                    'string',
                    'nullable',
                ],
            ],
            'fictiv'  => [
                [
                    'string',
                    'nullable',
                ],
            ],
        ];
    }
}