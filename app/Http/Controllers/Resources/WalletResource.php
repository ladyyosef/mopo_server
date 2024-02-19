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
            'quantity' => 12,//$this->quantity,
            'name' =>'kkkk',// $this->currency->Currency_name,
            //'logo' => 'kk',//$this->currency->logo,
            'Abbrevation' =>'kkk',// $this->currency->Abbrevation,
            'price' => 99,//$this->currency->prices?->first()?->price,
            'percentage'=>0/*mai*/
            //'percentage' => round(($this->currency->prices?->first()?->price - $this->currency->prices?->last()?->price), 1),
        ];
    }
}
