<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CurrencyResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray(Request $request): array {
    return [
      'country_name'  => $this->country_name,
      'country_flag'  => $this->country_flag,
      'code'          => $this->code,
      'is_default'    => $this->is_default,
      'selling_price' => $this->selling_price,
      'buying_price'  => $this->buying_price,
    ];
  }
}
