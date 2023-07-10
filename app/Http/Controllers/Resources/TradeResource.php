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
    return [
      'id' => $this->id,
      'user_in_name' => $this->userIn->Full_name,
      'currency_abbrivation_in' => $this->currency->Abbrevation,
      'currency_abbrivation_out' => $this->currencyOut->Abbrevation,
      'currency_logo_in' => $this->currency->logo,
      'currency_logo_out' => $this->currencyOut->logo,
      'quantity_in' => $this->quantity_in,
      'quantity_out' => $this->quantity_out,
    ];
  }
}
