<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TradeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      return[
        'account_number' => new AccountResource($this->whenLoaded('account')),
        'currency_id_in'=> new DetailsCurrencyResource($this->whenLoaded('currency')),
        'currency_id_out' => new DetailsCurrencyResource($this->whenLoaded('currencyOut')),
        'price' =>$this->price,
        'quantity' => $this->quantity,
    ];

    }
}
