<?php

namespace App\Http\Resources\Visitors;

use App\Http\Resources\Visitors\Profile\ProfileRegionResources;
use App\Http\Resources\Visitors\Profile\ProfilePlaceResources;
use App\Http\Resources\Visitors\Profile\ProfileUserResources;
use App\Http\Resources\Visitors\Profile\ProfileProductsResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'serie'         => $this->region->mnemonic . ' ' . $this->number,
            'region'        => new ProfileRegionResources($this->region),
            'place'         => new ProfilePlaceResources($this->place),
            'products'      => ProfileProductsResource::collection($this->apiProfileProducts),
            'user'          => new ProfileUserResources($this->created_by),
        ];
    }
}