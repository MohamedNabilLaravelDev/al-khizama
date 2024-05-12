<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\General\dateIntervalsRequest;
use App\Http\Resources\Api\CurrencyResource;
use App\Http\Resources\Api\OfferResource;
use App\Http\Resources\Api\Settings\IntroResource;
use App\Http\Resources\Api\TransactionTipCollection;
use App\Models\Currency;
use App\Models\Day;
use App\Models\IntroSlider;
use App\Models\Offer;
use App\Traits\ResponseTrait;
use DateTime;

class MainController extends Controller {

  use ResponseTrait;

  /********************* // offers //************************** */
  public function offers() {
    $offers = Offer::available()->get();

    $data = OfferResource::collection($offers);
    return $this->successData($data);
  }

  /********************* // home //************************** */
  public function home() {
    $sliders              = IntroSlider::take(3)->get();
    $transferTransactions = auth('sanctum')->user()->transferTransactions()->latest()->paginate(5);

    $data = [
      'sliders'              => IntroResource::collection($sliders),
      'transferTransactions' => new TransactionTipCollection($transferTransactions),
    ];
    return $this->successData($data);
  }

  /********************* // currencies //************************** */
  public function currencies() {
    $currencies = Currency::whereIsAvailable(1)->whereIsDefault(0)->get();

    $data = CurrencyResource::collection($currencies);
    return $this->successData($data);
  }

  /********************* // deliveryDate //************************** */
  public function deliveryDate() {
    $data  = [];
    $times = [];
    $date1 = now();
    $date2 = now()->endOfWeek();

    $datePeriod = $this->returnDates($date1, $date2);

    foreach ($datePeriod as $date) {

      $day       = Day::where('name->en', $date->format('l'))->first();
      $intervals = $day->dayIntervals;

      foreach ($intervals as $key => $time) {
        $times[] = [
          'interval_id' => $time->id,
          'from'        => $time->from,
          'to'          => $time->to,
        ];
      }

      $data[] = [
        'full_date' => $date->format('Y-m-d'),
        'date'      => \Carbon\Carbon::parse($date)->translatedFormat('l jS F'),
        'intervals' => $times,
      ];
    }

    return $this->successData($data);
  }

  /********************* // dateIntervals //************************** */
  public function dateIntervals(dateIntervalsRequest $request) {
    $date      = new DateTime($request->date);
    $day       = Day::where('name->en', $date->format('l'))->first();
    $intervals = $day->dayIntervals;
    $times     = [];
    foreach ($intervals as $key => $time) {
      $times[] = [
        'from' => $time->from,
        'to'   => $time->to,
      ];
    }

    return $this->successData($times);
  }

  public function returnDates($fromdate, $todate) {
    return new \DatePeriod(
      $fromdate,
      new \DateInterval('P1D'),
      $todate->modify('+1 day')
    );
  }

}
