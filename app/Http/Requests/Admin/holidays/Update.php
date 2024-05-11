<?php

namespace App\Http\Requests\Admin\holidays;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest {
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'title.*'       => 'nullable',
      'description.*' => 'nullable',
      'date'          => 'nullable|date',
      'is_active'     => 'nullable',
    ];
  }
}
