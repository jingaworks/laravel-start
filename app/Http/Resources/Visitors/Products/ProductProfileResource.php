<?php

namespace App\Http\Resources\Visitors\Products;

use App\Http\Resources\Visitors\Products\ProductImagesResources;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductAtestatResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'name'          => $this->name,
            'serie'         => $this->region->mnemonic . ' ' . $this->number,
        ];
    }
}