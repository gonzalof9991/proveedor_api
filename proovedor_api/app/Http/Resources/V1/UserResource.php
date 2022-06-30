<?php

namespace App\Http\Resources\V1;

use App\Models\TypeOfUser;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'type_of_user_id' => $this->type_of_user_id,
            'tickets' => TicketResource::collection($this->whenLoaded('ticket'))
        ];
    }
}
