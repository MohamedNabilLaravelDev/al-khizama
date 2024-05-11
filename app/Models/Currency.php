<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Currency extends BaseModel {

  const IMAGEPATH = 'currencies';

  use HasTranslations;

  protected $fillable = [
    'country_name', 'country_flag', 'name', 'code', 'selling_price', 'buying_price', 'is_available', 'is_default',
  ];

  public $translatable = ['country_name', 'name'];

  protected $casts = [
    'is_available'  => 'boolean',
    'is_default'    => 'boolean',
    'selling_price' => 'decimal:4',
    'buying_price'  => 'decimal:4',
  ];

  public function getCountryFlagAttribute() {
    if ($this->attributes['country_flag']) {
      $image = $this->getImage($this->attributes['country_flag'], 'currency');
    } else {
      $image = $this->defaultImage('currency');
    }
    return $image;
  }

  public function setCountryFlagAttribute($value) {
    if (null != $value && is_file($value)) {
      isset($this->attributes['country_flag']) ? $this->deleteFile($this->attributes['country_flag'], 'currency') : '';
      $this->attributes['country_flag'] = $this->uploadAllTyps($value, 'currency');
    }
  }

  public static function allAvailable() {
    return self::where('is_available', 1)->get();
  }

}
