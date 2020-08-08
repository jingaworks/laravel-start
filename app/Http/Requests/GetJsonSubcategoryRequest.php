<?php

namespace App\Http\Requests;

use App\Models\Product;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class GetJsonSubcategoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('product_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'category_id' => [
                [
                    'required',
                    'integer',
                    'exists:categories,id'
                ],
            ],
        ];
    }
}