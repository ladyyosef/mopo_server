<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SendResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
           
            'currency_id' =>new CurrencyResource($this->whenLoaded('Currency')),
            'email'=>$this->email,
            'quantity' => $this->quantity,
        ];
    }
}
