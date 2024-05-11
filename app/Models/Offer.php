<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Offer extends BaseModel {
  const IMAGEPATH = 'offers';

  use HasTranslations;

  protected $fillable = ['title', 'description', 'image', 'is_available'];

  public $translatable = ['title', 'description'];

  public function scopeAvailable($query) {
    return $query->where('is_available', 1);
  }

}
