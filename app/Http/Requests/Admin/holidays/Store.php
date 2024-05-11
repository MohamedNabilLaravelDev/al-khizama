<?php

namespace App\Http\Requests\Admin\holidays;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'title.*'       => 'required',
      'description.*' => 'required',
      'date'          => 'required|date',
      'is_active'     => 'required',
    ];
  }
}
