<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Day extends BaseModel {
  const IMAGEPATH = 'days';

  use HasTranslations;

  protected $fillable = [
    'name', 'is_available',
  ];

  public $translatable = ['name'];

  public function dayIntervals() {
    return $this->hasMany(DayInterval::class, 'day_id');
  }

}
