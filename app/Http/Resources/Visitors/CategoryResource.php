<?php

namespace App\Http\Resources\Visitors;

use App\Http\Resources\Visitors\Category\CategoryProductsResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'slug'          => $this->slug,
            'products'      => CategoryProductsResource::collection($this->products),
        ];
    }
}