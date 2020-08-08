<?php

namespace App\Http\Resources\Visitors\Profile;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfilePlaceResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->denloc,
        ];
    }
}