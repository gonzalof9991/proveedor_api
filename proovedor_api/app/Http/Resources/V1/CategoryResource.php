<?php

namespace App\Http\Resources\V1;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'products' =>  ProductResource::collection($this->whenLoaded('products')),
        ];
    }

}
