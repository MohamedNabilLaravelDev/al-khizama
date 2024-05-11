<?php

namespace App\Http\Requests\Admin\days;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest {
  public function authorize() {
    return true;
  }

  public function rules() {

    return [
      'is_available' => 'nullable|in:0,1',
      'from_id'      => 'nullable|array',
      'from_id.*'    => 'nullable|exists:times,id',
      'to_id'        => 'nullable|array',
      'to_id.*'      => 'nullable|exists:times,id',
    ];
  }

  public function withValidator($validator) {
    if (!$validator->fails()) {

      $validator->after(function ($validator) {
        $fromRequests = request('from_id');

        foreach ($fromRequests as $key => $fromRequest) {
          if ($fromRequest >= request('to_id')[$key]) {
            $validator->errors()->add('to_id', trans('validation.unavailable_time'));
          }
        }

      });
    }
  }

}
