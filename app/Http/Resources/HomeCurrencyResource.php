<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeCurrencyResource extends JsonResource
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
            'logo' => $this->logo,
            'Currency_name' => $this->Currency_name,
            'Abbrevation' => $this->Abbrevation,
            'new_price' => $this->prices->first()?->price,
            'old_price' => $this->prices->last()?->price,
            'percentage' => round(($this->prices?->first()?->price - $this->prices?->last()?->price), 1),
            'created_at' => $this->created_at,
        ];
    }
}
