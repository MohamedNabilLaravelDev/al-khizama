<?php

namespace App\Http\Requests\Admin\currencies;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class Store extends FormRequest {
  public function authorize() {
    return true;
  }

  public function __construct(Request $request) {
    $request['is_default'] = 0;
  }

  public function rules() {

    return [
      'name.*'         => 'required|max:191',
      'country_name.*' => 'required|max:191',
      'country_flag'   => 'required|image|mimes:jpg,png,jpeg|max:2048',
      'code'           => 'required',
      'selling_price'  => 'required|numeric',
      'buying_price'   => 'required|numeric',
      'is_available'   => 'required|in:0,1',
      'is_default'     => 'nullable|in:0,1',
    ];
  }
}
