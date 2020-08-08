<?php

namespace App\Http\Resources\Visitors\Category;

use App\Http\Resources\Visitors\Profile\ProfileRegionResources;
use App\Http\Resources\Visitors\Profile\ProfilePlaceResources;
use App\Http\Resources\Visitors\Profile\ProfileUserResources;
use App\Http\Resources\Visitors\Products\ProductProfileResource;
use App\Http\Resources\Visitors\Products\ProductImagesResources;
use App\Http\Resources\Visitors\Products\ProductSubcategoryResources;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CategoryProductsResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'title'         => $this->title,
            'slug'          => $this->slug,
            'description'   => Str::limit($this->description, 200),
            'subcategory'   => new ProductSubcategoryResources($this->subcategory),
            'region'        => new ProfileRegionResources($this->region),
            'place'         => new ProfilePlaceResources($this->place),
            'profile'       => new ProductProfileResource($this->profile->first()),
            'user'          => new ProfileUserResources($this->created_by),
            'images'        => ProductImagesResources::collection($this->images),
        ];
    }
}