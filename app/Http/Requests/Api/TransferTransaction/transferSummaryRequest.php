<?php

namespace App\Http\Requests\Api\TransferTransaction;

use App\Http\Requests\Api\BaseApiRequest;
use App\Models\Currency;
use Illuminate\Http\Request;

class transferSummaryRequest extends BaseApiRequest {

  public function __construct(Request $request) {
    $request['sender_id']             = auth('sanctum')->id();
    $request['sent_currency_type_id'] = Currency::whereIsDefault(1)->first()?->id ?? 1;
    $request['app_fees']              = SETTING_VALUE('app_fees') ?? 0;
  }
  public function rules() {

    return [
      'sender_id'                 => 'nullable|exists:users,id,active,1',

      'type'                      => 'required|in:self,other',

      'sent_amount'               => 'required|numeric|min:1',

      'app_fees'                  => 'nullable|numeric',

      'sent_currency_type_id'     => 'nullable|exists:currencies,id,is_available,1',

      // 'received_amount'           => 'required|numeric|min:1',

      'received_currency_type_id' => 'required|exists:currencies,id,is_available,1',
    ];
  }

  public function withValidator($validator) {
    if (!$validator->fails()) {

      $validator->after(function ($validator) {

        // check sent_amount == received_amount counts
        // if (count(request('sent_amount')) != count(request('received_amount'))) {
        //   $validator->errors()->add('sent_amount', __('validation.sent_amount_not_match'));
        // }

      });
    }
  }
}
