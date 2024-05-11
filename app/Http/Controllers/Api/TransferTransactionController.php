<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\TransferTransaction\changeCurrencyRequest;
use App\Http\Requests\Api\TransferTransaction\makeTransferRequest;
use App\Http\Requests\Api\TransferTransaction\showTransferByIdRequest;
use App\Http\Requests\Api\TransferTransaction\transferSummaryRequest;
use App\Http\Resources\Api\transferTransactionResource;
use App\Http\Resources\Api\transferTransactionTipResource;
use App\Models\Currency;
use App\Models\transferAmount;
use App\Models\transferTransaction;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;

class TransferTransactionController extends Controller {
  use ResponseTrait;

  /******************  // changeCurrency // *********************/
  public function changeCurrency(changeCurrencyRequest $request) {
    $currency    = Currency::find($request->currency_id);
    $equalAmount = $request->amount * $currency->buying_price;

    $data = [
      'equal_amount' => $equalAmount,
    ];
    return $this->successData($data);
  }

  /******************  // makeTransfer // *********************/
  public function makeTransfer(makeTransferRequest $request) {

    // $request             = $request->validated();
    $transferTransaction = DB::transaction(function () use ($request) {

      $fixedData = [
        'serial'                => \rand(111, 999) . '-' . \rand(111, 999) . '-' . \rand(111, 999),
        'sender_id'             => $request['sender_id'],
        'type'                  => $request->type,

        'sender_name'           => $request->sender_name,
        'sender_phone_key'      => $request->sender_phone_key,
        'sender_phone'          => $request->sender_phone,
        'sender_id_image'       => $request->sender_id_image,

        'receiver_name'         => 'other' == $request->type ? $request->receiver_name : $request->sender_name,
        'receiver_phone_key'    => 'other' == $request->type ? $request->receiver_phone_key : $request->sender_phone_key,
        'receiver_phone'        => 'other' == $request->type ? $request->receiver_phone : $request->sender_phone,
        'receiver_id_image'     => 'other' == $request->type ? $request->receiver_id_image : $request->sender_id_image,

        'receive_city_id'       => $request->receive_city_id,
        'area_num'              => $request->area_num,
        'street_name'           => $request->street_name,
        'avenue'                => $request->avenue,
        'house_num'             => $request->house_num,

        'app_fees'              => $request->app_fees,

        'receive_date'          => $request->receive_date,
        'interval_id'           => $request->interval_id,

        'payment_method'        => $request->payment_method,

        'sent_currency_type_id' => $request->sent_currency_type_id,
      ];

      $transferTransaction = transferTransaction::create($fixedData);

      foreach ($request->sent_amount as $key => $sentAmount) {
        transferAmount::create([
          'transfer_transaction_id'     => $transferTransaction->id,
          'sender_id'                   => $request->sender_id,
          'sent_amount'                 => $request->sent_amount[$key],
          'sent_currency_type_id'       => $request->sent_currency_type_id,
          'received_amount'             => $request->received_amount[$key],
          'received_currency_type_id'   => $request->received_currency_type_id[$key],
          'total_paid_amount'           => $request->sent_amount[$key],
          'total_paid_currency_type_id' => $request->sent_currency_type_id,
          'status'                      => $request->status,
        ]);
      }

      $transferTransaction->update([
        'total_paid_amount'           => $transferTransaction->transferAmounts->sum('total_paid_amount') + $request->app_fees,
        'total_paid_currency_type_id' => $request->sent_currency_type_id,
      ]);

      return $transferTransaction;

    });

    return $this->successMsg(__('apis.added'));
  }

  public function transferSummary(transferSummaryRequest $request) {
    $sendCurrency     = Currency::find($request->sent_currency_type_id);
    $receivedCurrency = Currency::find($request->received_currency_type_id);

    $totalSentAmount = $request->sent_amount;
    $appFees         = $request->app_fees;
    $totalPaid       = $totalSentAmount + $appFees;
    $buyPrice        = $sendCurrency->buying_price;
    $receivedPrice   = $buyPrice * $totalSentAmount;

    $data = [
      'sent_amount'      => $totalSentAmount,
      'transfer_fees'    => $appFees,
      'total_paid'       => $totalPaid,
      'selling_price'    => $buyPrice,
      'received_price'   => $receivedPrice,

      'sendCurrency'     => $sendCurrency->code,
      'receivedCurrency' => $receivedCurrency->code,
    ];

    return $this->successData($data);
  }

  public function showTransferById(showTransferByIdRequest $request) {
    $transferTransaction = transferTransaction::find($request->transfer_id);
    $data                = new transferTransactionResource($transferTransaction);

    return $this->successData($data);
  }

  public function myTransactions() {
    $transferTransaction = auth('sanctum')->user()->transferAmounts;
    $data                = transferTransactionTipResource::collection($transferTransaction);

    return $this->successData($data);
  }

}
