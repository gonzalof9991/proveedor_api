<?php

namespace App\Http\Resources\Api\V1;

use App\Http\Resources\V1\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'nro_ticket' => $this->nro_ticket,
            'status' => $this->status,
            'products' =>  ProductResource::collection($this->whenLoaded('products')),
        ];
    }
}
