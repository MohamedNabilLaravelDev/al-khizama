<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayInterval extends Model {
  use HasFactory;

  protected $fillable = [
    'day_id', 'from_id', 'to_id', 'from', 'to',
  ];

  public function day() {
    return $this->belongsTo(Day::class, 'day_id', 'id');
  }

  public function from() {
    return $this->belongsTo(Time::class, 'from_id', 'id');
  }

  public function to() {
    return $this->belongsTo(Time::class, 'to_id', 'id');
  }
}
