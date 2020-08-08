<?php

namespace App\Http\Resources\Visitors\Products;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductImagesResources extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'url'           => $this->url,
            'thumbnail'     => $this->thumbnail,
        ];
    }
}