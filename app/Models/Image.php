<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;

class Image extends BaseModel {
  const IMAGEPATH = 'images';

  use HasTranslations;

  protected $fillable = [
    'name', 'start_date', 'end_date', 'link', 'sort', 'is_active', 'image',
  ];

  public $translatable = ['name'];

  public function scopeActive($query) {
    return $query->where('is_active', 1);
  }

}
