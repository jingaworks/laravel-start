<?php

namespace App\Http\Resources\Visitors\Atestat;

use App\Http\Resources\Visitors\Products\ProductImagesResources;
use App\Http\Resources\Visitors\Products\ProductCategoryResources;
use App\Http\Resources\Visitors\Products\ProductSubcategoryResources;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class AtestatProductsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'slug'          => $this->slug,
            'description'   => Str::limit($this->description, 200),
            'category'      => new ProductCategoryResources($this->category),
            'subcategory'   => new ProductSubcategoryResources($this->subcategory),
            'images'        => ProductImagesResources::collection($this->images),
        ];
    }
}