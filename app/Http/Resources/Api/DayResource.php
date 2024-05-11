<?php

namespace App\Http\Resources\Api;

use App\Models\Time;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DayResource extends JsonResource {

  public function toArray(Request $request): array {
    dd(\Carbon\Carbon::parse($this)->translatedFormat('l jS F'));
    return [

      'date'      => \Carbon\Carbon::parse($this)->translatedFormat('l jS F'),

      'intervals' => $this->dateIntervals($this),
    ];
  }

  public function dateIntervals($date) {
    $times = Time::where('name->en', $date->format('l'))->get();
    dd($times);
  }

}
