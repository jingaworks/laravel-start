<?php

namespace App\Http\Resources\Visitors;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}