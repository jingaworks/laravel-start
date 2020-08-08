<?php

namespace App\Http\Resources\Visitors\Atestat;

use Illuminate\Http\Resources\Json\JsonResource;

class AtestatRegionResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->denj,
        ];
    }
}