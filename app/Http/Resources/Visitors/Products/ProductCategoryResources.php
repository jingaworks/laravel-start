<?php

namespace App\Http\Resources\Visitors\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductCategoryResources extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'name'          => $this->name,
            'slug'          => $this->slug,
        ];
    }
}