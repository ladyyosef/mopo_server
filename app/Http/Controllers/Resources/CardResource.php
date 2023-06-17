<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'Card_number'=>$this->Card_number,
            'Holder_Name'=>$this->Holder_Name,
            'Cvc'=>$this->Cvc,
            'Card_image'=>$this->Card_image,
            'Expire_Date'=>$this->Expire_Date,
            'Wallet_id' => new WalletResource($this->whenLoaded('wallet'))
        ];
    }
}
