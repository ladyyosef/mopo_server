<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BuyResource extends JsonResource
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
            'currency_id_in'=> new CurrencyResource($this->whenLoaded('currency')),
            'currency_id_out' => new CurrencyResource($this->whenLoaded('currencyOut')),
            'quantity' => $this->quantity,
        ];
    }
}
