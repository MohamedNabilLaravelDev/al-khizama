<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class transferTransactionResource extends JsonResource {
  /**
   * Transform the resource into an array.
   *
   * @return array<string, mixed>
   */
  public function toArray($request): array {

    return [
      'id'                => $this->id,

      'serial'            => $this->serial,

      'total_paid_amount' => $this->total_paid_amount,
      'currency_code'     => $this->totalPaidCurrencyType->code,

      'sender_name'       => $this->sender_name,
      'receiver_name'     => $this->receiver_name,

      'payment_date'      => $this->payment_date?\Carbon\Carbon::parse($this->payment_date)->translatedFormat('l jS F') : \Carbon\Carbon::parse($this->created_at)->translatedFormat('l jS F'),
      'transfer_fees'     => $this->app_fees,

      'transfer_amounts'  => transferAmountResource::collection($this->transferAmounts),

    ];
  }
}
