<?php

namespace App\Http\Requests\Api\General;

use App\Http\Requests\Api\BaseApiRequest;

class dateIntervalsRequest extends BaseApiRequest {
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize() {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules() {
    return [
      'date' => 'required|date|after_or_equal:' . date('Y-m-d'),
    ];
  }
}
