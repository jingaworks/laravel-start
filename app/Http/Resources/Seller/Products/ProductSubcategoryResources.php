<?php

namespace App\Http\Resources\Seller\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductSubcategoryResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'slug'          => $this->slug,
        ];
    }
}