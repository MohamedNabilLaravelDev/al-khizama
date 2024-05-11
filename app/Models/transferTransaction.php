<?php

namespace App\Models;

class transferTransaction extends BaseModel {

  const IMAGEPATH = 'transfer_transactions';

  protected $fillable = [
    'serial', 'sender_id', 'type', 'sender_name', 'sender_phone_key', 'sender_phone', 'sender_id_image', 'receiver_name', 'receiver_phone_key', 'receiver_phone', 'receiver_id_image',
    'receive_city_id', 'area_num', 'street_name', 'avenue', 'house_num',
    'app_fees', 'added_value', 'total_paid_amount', 'total_paid_currency_type_id',
    'status', 'receive_date', 'interval_id', 'payment_method', 'payment_token',
  ];

  public function sender() {
    return $this->belongsTo(User::class, 'sender_id');
  }

  public function transferAmounts() {
    return $this->hasMany(transferAmount::class, 'transfer_transaction_id');
  }

  public function getSenderIdImageAttribute() {
    if ($this->attributes['sender_id_image']) {
      $image = $this->getImage($this->attributes['sender_id_image'], 'transfer_transactions');
    } else {
      $image = $this->defaultImage('transfer_transactions');
    }
    return $image;
  }

  public function setSenderIdImageAttribute($value) {
    if (null != $value && is_file($value)) {
      isset($this->attributes['sender_id_image']) ? $this->deleteFile($this->attributes['sender_id_image'], 'transfer_transactions') : '';
      $this->attributes['sender_id_image'] = $this->uploadAllTyps($value, 'transfer_transactions');
    }
  }

  public function getReceiverIdImageAttribute() {
    if ($this->attributes['receiver_id_image']) {
      $image = $this->getImage($this->attributes['receiver_id_image'], 'transfer_transactions');
    } else {
      $image = $this->defaultImage('transfer_transactions');
    }
    return $image;
  }

  public function setReceiverIdImageAttribute($value) {
    if (null != $value && is_file($value)) {
      isset($this->attributes['receiver_id_image']) ? $this->deleteFile($this->attributes['receiver_id_image'], 'transfer_transactions') : '';
      $this->attributes['receiver_id_image'] = $this->uploadAllTyps($value, 'transfer_transactions');
    }
  }

  public function totalPaidCurrencyType() {
    return $this->belongsTo(Currency::class, 'total_paid_currency_type_id');
  }

  public function receiveCity() {
    return $this->belongsTo(City::class, 'receive_city_id', 'id');
  }

}
