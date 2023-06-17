<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;

use Illuminate\Http\Resources\Json\JsonResource;

class TransductionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       return[
        'User_out' => new DetailsResource($this->whenLoaded('userOut')),
        'User_in'=> new DetailsResource($this->whenLoaded('userIn')),
        'trade_id' => new TradeResource($this->whenLoaded('trade')),
       ];
    }
}
