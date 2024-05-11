<?php

namespace App\Http\Requests\Api\TransferTransaction;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Http\Request;

class changeCurrencyRequest extends BaseApiRequest {

  public function __construct(Request $request) {
    //
  }
  public function rules() {
    return [
      'currency_id' => 'required|exists:currencies,id,is_available,1,is_default,0',
      'amount'      => 'required|numeric',
    ];
  }
}
