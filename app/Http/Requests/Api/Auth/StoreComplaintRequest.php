<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\BaseApiRequest;

class StoreComplaintRequest extends BaseApiRequest {

  public function rules() {
    return [
      'user_name'    => 'required|max:50',
      'country_code' => 'required|numeric|digits_between:2,5',
      'phone'        => 'required|max:20',
      'complaint'    => 'required|max:500',
    ];
  }
}
