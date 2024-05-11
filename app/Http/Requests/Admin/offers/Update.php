<?php

namespace App\Http\Requests\Admin\offers;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest {
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'title.*'       => 'nullable|max:191',
      'description.*' => 'nullable',
      'image'         => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
      'is_available'  => 'nullable|in:0,1',
    ];
  }
}
