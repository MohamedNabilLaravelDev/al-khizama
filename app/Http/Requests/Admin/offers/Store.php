<?php

namespace App\Http\Requests\Admin\offers;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest {
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'title.*'       => 'required|max:191',
      'description.*' => 'nullable',
      'image'         => 'required|image|mimes:jpg,png,jpeg|max:2048',
      'is_available'  => 'required|in:0,1',

    ];
  }
}
