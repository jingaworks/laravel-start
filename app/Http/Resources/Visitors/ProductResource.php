<?php

namespace App\Http\Resources\Visitors;

use App\Http\Resources\Visitors\Atestat\AtestatRegionResources;
use App\Http\Resources\Visitors\Atestat\AtestatPlaceResources;
use App\Http\Resources\Visitors\Atestat\AtestatUserResources;
use App\Http\Resources\Visitors\Products\ProductAtestatResource;
use App\Http\Resources\Visitors\Products\ProductImagesResources;
use App\Http\Resources\Visitors\Products\ProductCategoryResources;
use App\Http\Resources\Visitors\Products\ProductSubcategoryResources;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'slug'          => $this->slug,
            'description'   => Str::limit($this->description, 200),
            'price_starts'  => $this->price_starts,
            'category'      => new ProductCategoryResources($this->category),
            'subcategory'   => new ProductSubcategoryResources($this->subcategory),
            'region'        => new AtestatRegionResources($this->region),
            'place'         => new AtestatPlaceResources($this->place),
            'atestat'       => new ProductAtestatResource($this->atestat->first()),
            'user'          => new AtestatUserResources($this->created_by),
            'images'        => ProductImagesResources::collection($this->images),
        ];
    }
}