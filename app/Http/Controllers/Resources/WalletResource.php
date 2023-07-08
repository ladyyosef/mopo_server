<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WalletResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'quantity' => $this->Quantity,
            'name' => $this->currency->Currency_name,
            'logo' => $this->currency->logo,
            'Abbrevation' => $this->currency->Abbrevation,
            'price' => $this->currency->prices?->first()?->price,
            'percentage' => round(($this->currency->prices?->first()?->price - $this->currency->prices?->last()?->price), 1),
        ];
    }
}
