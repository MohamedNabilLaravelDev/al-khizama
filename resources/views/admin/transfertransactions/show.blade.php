@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.view') . ' ' . __('admin.holiday')}}
                </h4>
            </div> --}}
            <div class="card-content">
                <div class="card-body">
                    <form class="show form-horizontal">
                        <div class="form-body">
                            <div class="row">

                                <!---------------------- // sender // ---------------------->
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.sender_name')}}</label>
                                        <div class="controls">
                                            <input type="text" name="sender_name"
                                              class="form-control"
                                              value="{{$transaction->sender_name}}"
                                              placeholder="{{__('admin.sender_name')}}"
                                              required
                                              data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.sender_phone')}}</label>
                                        <div class="controls">
                                            <input type="text" name="sender_phone"
                                              class="form-control"
                                              value="{{$transaction->selling_price}}"
                                              placeholder="{{__('admin.sender_phone')}}"
                                              required
                                              data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label"
                                      for="ex1">{{__('admin.sender_id_image')}}</label>
                                    <div class="mb-3 d-flex">
                                        @if (!Route::is('*.show'))
                                        <input class="form-control input-air-primary"
                                          id="ex1" type="file" name="sender_id_image">
                                        @endif
                                        @if (Route::is('*.edit'))
                                        <a href="{{$transaction->sender_id_image}}"
                                          target="__blanck"
                                          class=" btn btn-success form-selectgroup-label ms-1"
                                          data-fancybox="group"> <i class="fa fa-eye"></i>
                                        </a>
                                        @endif
                                        @if (Route::is('*.show'))
                                        <a href="{{$transaction->sender_id_image}}"
                                          target="__blanck"
                                          style="display: block;width: 100%;"
                                          class=" btn btn-success form-selectgroup-label ms-1"
                                          data-fancybox="group"> <i class="fa fa-eye"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>

                                <!---------------------- // receiver // ---------------------->
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.receiver_name')}}</label>
                                        <div class="controls">
                                            <input type="text" name="receiver_name"
                                              class="form-control"
                                              value="{{$transaction->receiver_name}}"
                                              placeholder="{{__('admin.receiver_name')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.receiver_phone')}}</label>
                                        <div class="controls">
                                            <input type="text" name="receiver_phone"
                                              class="form-control"
                                              value="{{$transaction->selling_price}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label class="form-label"
                                      for="ex1">{{__('admin.receiver_id_image')}}</label>
                                    <div class="mb-3 d-flex">
                                        @if (!Route::is('*.show'))
                                        <input class="form-control input-air-primary"
                                          id="ex1" type="file" name="receiver_id_image">
                                        @endif
                                        @if (Route::is('*.edit'))
                                        <a href="{{$transaction->receiver_id_image}}"
                                          target="__blanck"
                                          class=" btn btn-success form-selectgroup-label ms-1"
                                          data-fancybox="group"> <i class="fa fa-eye"></i>
                                        </a>
                                        @endif
                                        @if (Route::is('*.show'))
                                        <a href="{{$transaction->receiver_id_image}}"
                                          target="__blanck"
                                          style="display: block;width: 100%;"
                                          class=" btn btn-success form-selectgroup-label ms-1"
                                          data-fancybox="group"> <i class="fa fa-eye"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>

                                <!---------------------- // Address // ---------------------->
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.receive_city')}}</label>
                                        <div class="controls">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.street_name')}}</label>
                                        <div class="controls">
                                            <input type="text" name="street_name"
                                              class="form-control"
                                              value="{{$transaction->street_name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.house_num')}}</label>
                                        <div class="controls">
                                            <input type="text" name="house_num"
                                              class="form-control"
                                              value="{{$transaction->house_num}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.app_fees')}}</label>
                                        <div class="controls">
                                            <input type="text" name="app_fees"
                                              class="form-control"
                                              value="{{$transaction->app_fees}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.total_paid_amount')}}</label>
                                        <div class="controls">
                                            <input type="text" name="total_paid_amount"
                                              class="form-control"
                                              value="{{$transaction->total_paid_amount}} {{ $transaction->totalPaidCurrencyType->code}}">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <h3> {{__('admin.transferAmount')}} </h3>
                            <hr>
                            <br>
                            <div class="row">



                                @foreach ($transferAmounts as $transferAmount)
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.sent_amount')}}</label>
                                        <div class="controls">
                                            <input type="text" name="sent_amount"
                                              class="form-control"
                                              value="{{$transferAmount->sent_amount}} {{ $transferAmount->sentCurrencyType->code}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.received_amount')}}</label>
                                        <div class="controls">
                                            <input type="text" name="received_amount"
                                              class="form-control"
                                              value="{{$transferAmount->received_amount}} {{ $transferAmount->receivedCurrencyType->code}}">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="col-12 d-flex justify-content-center mt-3">
                                <a href="{{ url()->previous() }}" type="reset"
                                  class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

@endsection

@section('js')
<script>
    $('.show input').attr('disabled' , true)
        $('.show textarea').attr('disabled' , true)
        $('.show select').attr('disabled' , true)
</script>
@endsection