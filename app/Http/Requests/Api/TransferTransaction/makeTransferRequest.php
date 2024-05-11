<?php

namespace App\Http\Requests\Api\TransferTransaction;

use App\Http\Requests\Api\BaseApiRequest;
use App\Models\Currency;
use App\Models\Day;
use App\Models\DayInterval;
use App\Models\Holiday;
use DateTime;
use Illuminate\Http\Request;

class makeTransferRequest extends BaseApiRequest {

  public function __construct(Request $request) {
    $request['sender_id']             = auth('sanctum')->id();
    $request['sender_phone']          = \fixPhone(request('sender_phone'));
    $request['receiver_phone']        = \fixPhone(request('receiver_phone'));
    $request['sent_currency_type_id'] = Currency::whereIsDefault(1)->first()?->id ?? 1;
    $request['status']                = 'pending';
    $request['app_fees']              = SETTING_VALUE('app_fees') ?? 0;
  }
  public function rules() {

    return [
      'sender_id'                   => 'nullable|exists:users,id,active,1',

      'type'                        => 'required|in:self,other',

      'sender_name'                 => 'required|max:191',
      'sender_phone_key'            => 'required',
      'sender_phone'                => 'required',
      'sender_id_image'             => 'required|image|mimes:jpg,png,jpeg|max:2048',

      'receiver_name'               => 'required_if:type,other|max:191',
      'receiver_phone_key'          => 'required_if:type,other',
      'receiver_phone'              => 'required_if:type,other',
      'receiver_id_image'           => 'required_if:type,other|image|mimes:jpg,png,jpeg|max:2048',

      'receive_city_id'             => 'required|exists:cities,id',
      'area_num'                    => 'required',
      'street_name'                 => 'required',
      'avenue'                      => 'nullable',
      'house_num'                   => 'required',

      'sent_amount'                 => 'required|array',
      'sent_amount.*'               => 'required|numeric|min:1',

      'app_fees'                    => 'nullable|numeric',

      'sent_currency_type_id'       => 'nullable|exists:currencies,id,is_available,1',

      'received_amount'             => 'required|array',
      'received_amount.*'           => 'required|numeric|min:1',

      'received_currency_type_id'   => 'required|array',
      'received_currency_type_id.*' => 'required|exists:currencies,id,is_available,1',

      'receive_date'                => 'required|date|after_or_equal:' . now()->format('Y-m-d'),
      'interval_id'                 => 'required|exists:day_intervals,id',

      'payment_method'              => 'required|in:online,cash',

      'status'                      => 'nullable|in:pending,success,failed',
    ];
  }

  public function withValidator($validator) {
    if (!$validator->fails()) {

      $validator->after(function ($validator) {

        // check sent_amount == received_amount counts
        if (count(request('sent_amount')) != count(request('received_amount'))) {
          $validator->errors()->add('sent_amount', __('validation.sent_amount_not_match'));
        }

        // check receive_date_id date equal | after now
        $time = DayInterval::find(request('interval_id'))->to;
        if (request('receive_date') == now()->format('Y-m-d')) {
          if (now()->format('H:i:s') >= $time) {
            $validator->errors()->add('receive_time', __('validation.unavailable_time'));
          }
        }

        //check date time in intervals
        $date = new DateTime(request('receive_date'));
        $day  = Day::where('name->en', $date->format('l'))->whereIsAvailable(1)->first();
        if (!$day) {
          $validator->errors()->add('receive_date', __('validation.unavailable_date'));
        }

        $holiday = Holiday::whereIsActive(1)->where('date', request('receive_date'))->first();
        if ($holiday) {
          $validator->errors()->add('receive_date', __('validation.unavailable_date'));
        }

      });
    }
  }
}
