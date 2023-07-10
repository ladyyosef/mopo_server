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
            'name' => $this->user->Full_name,
            'email' => $this->user->email,
            'abbrevation' => $this->currency->Abbrevation,
            'created_at' => $this->created_at,
            'quantity' => $this->quantity,
        ];
    }
}
