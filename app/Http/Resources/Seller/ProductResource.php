<?php

namespace App\Http\Resources\Seller;

use App\Http\Resources\Seller\Products\ProductCategoryResources;
use App\Http\Resources\Seller\Products\ProductSubcategoryResources;
use App\Http\Resources\Seller\Products\ProductImagesResources;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description'   => Str::limit($this->description, 200),
            'category' => new ProductCategoryResources($this->category),
            'subcategory' => new ProductSubcategoryResources($this->subcategory),
            'images' => ProductImagesResources::collection($this->images),
        ];
    }
}