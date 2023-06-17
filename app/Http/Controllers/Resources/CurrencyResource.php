<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [

            'logo' =>$this->logo,
            'Currency_name' =>$this->Currency_name,
            'Abbrevation' =>$this->Abbrevation,
         
        ];
    }
}
