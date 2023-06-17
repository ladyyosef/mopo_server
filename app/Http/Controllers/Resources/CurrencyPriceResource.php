<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
class CurrencyPriceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'today_price'=>$this->today_price,
            'yesterday_price'=>$this->yesterday_price,
            'percentage'=>$this->percentage,
            'Date_Time'=>$this->Date_Time,
            'currency_id'=> new CurrencyResource($this->whenLoaded('Currency')),

        ];
    }
}
