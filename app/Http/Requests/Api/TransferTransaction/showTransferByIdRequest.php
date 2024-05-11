<?php

namespace App\Http\Requests\Api\TransferTransaction;

use App\Http\Requests\Api\BaseApiRequest;
use Illuminate\Http\Request;

class showTransferByIdRequest extends BaseApiRequest {

  public function __construct(Request $request) {
    //
  }
  public function rules() {
    return [
      'transfer_id' => 'required|exists:transfer_transactions,id',
    ];
  }
}
