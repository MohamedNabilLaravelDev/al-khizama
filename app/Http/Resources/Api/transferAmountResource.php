<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class transferAmountResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray($request): array {

    return [
      'id'                        => $this->id,
      'transfer_transaction_id'   => $this->transfer_transaction_id,

      'sent_amount'               => $this->sent_amount,
      'sent_currency_type'        => $this->sentCurrencyType->code,

      'received_amount'           => $this->received_amount,
      'received_currency_type_id' => $this->receivedCurrencyType->code,

      'selling_price'             => $this->selling_price,
      'buying_price'              => $this->buying_price,
    ];
  }
}
