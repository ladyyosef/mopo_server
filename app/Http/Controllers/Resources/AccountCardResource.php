<?php

namespace App\Http\Controllers\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountCardResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'Full_name' => $this->Full_name,
            'email'  => $this->email,
            'phone'  => $this->phone,
            'Profile_image' =>$this->Profile_image,

        ];
    }
}
