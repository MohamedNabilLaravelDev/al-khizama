<?php

namespace App\Http\Requests\Admin\currencies;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest {
  public function authorize() {
    return true;
  }

  public function rules() {
    return [
      'name.*'         => 'nullable|max:191',
      'country_name.*' => 'nullable|max:191',
      'country_flag'   => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
      'code'           => 'nullable',
      'selling_price'  => 'nullable|numeric',
      'buying_price'   => 'nullable|numeric',
      'is_available'   => 'nullable|in:0,1',

    ];
  }
}
