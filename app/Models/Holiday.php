<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;

class Holiday extends BaseModel {

  use HasTranslations;

  protected $fillable = ['title', 'description', 'date', 'is_active'];
  protected $casts    = [
    'is_active' => 'boolean',
  ];
  public $translatable = ['title', 'description'];

}
