<?php

namespace App\Http\Resources\Visitors\Atestat;

use Illuminate\Http\Resources\Json\JsonResource;

class AtestatUserResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'email'         => $this->email,
            'phone'         => $this->phone,
        ];
    }
}