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

    // '', 'sender_id', 'type', 'sender_name', 'sender_phone_key', 'sender_phone', 'sender_id_image', 'receiver_name', 'receiver_phone_key', 'receiver_phone', 'receiver_id_image',
    // 'receive_city_id', 'area_num', 'street_name', 'avenue', 'house_num',
    // 'app_fees', 'added_value', 'total_paid_amount', 'total_paid_currency_type_id',
    // 'status', 'receive_date', 'interval_id', 'payment_method', 'payment_token','payment_date'

    return [
      'id'                => $this->id,

      'serial'            => $this->serial,

      'total_paid_amount' => $this->total_paid_amount,
      'currency_code'     => $this->totalPaidCurrencyType->code,

      'sender_name'       => $this->sender_name,
      'receiver_name'     => $this->receiver_name,

      'payment_date'      => $this->payment_date?\Carbon\Carbon::parse($this->payment_date)->translatedFormat('l jS F') : \Carbon\Carbon::parse($this->created_at)->translatedFormat('l jS F'),
    ];
  }
}
