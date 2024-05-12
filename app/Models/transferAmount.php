<?php

namespace App\Models;

class transferAmount extends BaseModel {

  protected $fillable = [
    'transfer_transaction_id', 'sender_id', 'sent_amount', 'sent_currency_type_id', 'received_amount', 'received_currency_type_id', 'app_fees', 'added_value', 'total_paid_amount', 'total_paid_currency_type_id',
    'status', 'selling_price', 'buying_price',
  ];
  /**
   * 'selling_price','buying_price' => at that moment
   */

  public function sender() {
    return $this->belongsTo(User::class, 'sender_id');
  }

  public function receiver() {
    return $this->belongsTo(User::class, 'receiver_id');
  }

  public function transferTransaction() {
    return $this->belongsTo(transferTransaction::class, 'transfer_transaction_id');
  }

  public function totalPaidCurrencyType() {
    return $this->belongsTo(Currency::class, 'total_paid_currency_type_id');
  }

  public function receivedCurrencyType() {
    return $this->belongsTo(Currency::class, 'received_currency_type_id');
  }
  public function sentCurrencyType() {
    return $this->belongsTo(Currency::class, 'sent_currency_type_id');
  }

}
