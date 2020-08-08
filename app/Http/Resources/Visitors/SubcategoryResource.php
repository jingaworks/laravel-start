<?php

namespace App\Http\Resources\Visitors;

use App\Http\Resources\Visitors\Subcategory\SubcategoryProductsResource;
use App\Http\Resources\Visitors\Products\ProductCategoryResources;
use Illuminate\Http\Resources\Json\JsonResource;

class SubcategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'name'          => $this->name,
            'slug'          => $this->slug,
            'category'      => new ProductCategoryResources($this->category),
            'products'      => SubcategoryProductsResource::collection($this->products),
        ];
    }
}