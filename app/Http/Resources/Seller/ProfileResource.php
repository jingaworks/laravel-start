<?php

namespace App\Http\Resources\Seller;

use App\Http\Resources\Seller\Profile\ProfileRegionResources;
use App\Http\Resources\Seller\Profile\ProfilePlaceResources;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'serie' => $this->region->mnemonic . ' ' . $this->number,
            'region' => new ProfileRegionResources($this->region),
            'place' => new ProfilePlaceResources($this->place),
        ];
    }
}