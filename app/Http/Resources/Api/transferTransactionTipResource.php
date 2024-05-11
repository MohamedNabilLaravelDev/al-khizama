<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class transferTransactionTipResource extends JsonResource {

  public function toArray($request): array {

    return [
      'id'                    => $this->id,

      'serial'                => $this->serial,

      'total_paid_amount'     => $this->total_paid_amount,
      'currency_code'         => $this->receivedCurrencyType->code,
      'currency_country_name' => $this->receivedCurrencyType->country_name,
      'currency_country_flag' => $this->receivedCurrencyType->country_flag,

      'sender_name'           => $this->transferTransaction->sender_name,
      'receiver_name'         => $this->transferTransaction->receiver_name,

      'payment_date'          => \Carbon\Carbon::parse($this->created_at)->translatedFormat('l jS F'),
    ];
  }
}
