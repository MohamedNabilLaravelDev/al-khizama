<?php

namespace App\Http\Requests\Admin\days;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'is_available' => 'required|in:0,1',
    ];
  }
}
