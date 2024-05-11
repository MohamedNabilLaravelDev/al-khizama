@extends('admin.layout.master')
{{-- extra css files --}}
@section('css')
<link rel="stylesheet" type="text/css"
  href="{{asset('admin/app-assets/css-rtl/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css"
  href="{{asset('admin/app-assets/vendors/css/extensions/sweetalert2.min.css')}}">
@endsection
{{-- extra css files --}}

@section('content')
<form method="POST" action="{{route('admin.currencies.store')}}"
  class="store form-horizontal" enctype="multipart/form-data" novalidate>

    <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row">
            <div class="col-md-3">
                <div class="col-12 card card-body">
                    <div class="imgMontg col-12 text-center">
                        <div class="dropBox">
                            <div class="textCenter">
                                <div class="imagesUploadBlock">
                                    <label class="uploadImg">
                                        <span><i class="feather icon-image"></i></span>
                                        <input type="file" accept="image/*"
                                          name="country_flag" class="imageUploader">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-9">
                <div class="card">
                    {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.add')}}</h4>
                </div> --}}
                <div class="card-content">
                    <div class="card-body">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                {{-- to create languages tabs uncomment that --}}
                                <div class="col-12">
                                    <div class="col-12">
                                        <ul class="nav nav-tabs  mb-3">
                                            @foreach (languages() as $lang)
                                            <li class="nav-item">
                                                <a class="nav-link @if($loop->first) active @endif"
                                                  data-toggle="pill"
                                                  href="#first_{{$lang}}"
                                                  aria-expanded="true">{{ __('admin.data') }}
                                                    {{ $lang }}</a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    {{-- to create languages tabs uncomment that --}}
                                    <div class="tab-content">
                                        @foreach (languages() as $lang)
                                        <div role="tabpanel"
                                          class="tab-pane fade @if($loop->first) show active @endif "
                                          id="first_{{$lang}}"
                                          aria-labelledby="first_{{$lang}}"
                                          aria-expanded="true">
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label
                                                      for="first-name-column">{{__('admin.currencyName')}}
                                                        {{ $lang }}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                          name="name[{{$lang}}]"
                                                          class="form-control"
                                                          placeholder="{{__('admin.write') . __('admin.name')}} {{ $lang }}"
                                                          required
                                                          data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label
                                                      for="first-name-column">{{__('admin.country_name')}}
                                                        {{ $lang }}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                          name="country_name[{{$lang}}]"
                                                          class="form-control"
                                                          placeholder="{{__('admin.write') . __('admin.country_name')}} {{ $lang }}"
                                                          required
                                                          data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>


                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.selling_price')}}</label>
                                        <div class="controls">
                                            <input type="text" name="selling_price"
                                              class="form-control"
                                              placeholder="{{__('admin.selling_price')}}"
                                              required
                                              data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.buying_price')}}</label>
                                        <div class="controls">
                                            <input type="text" name="buying_price"
                                              class="form-control"
                                              placeholder="{{__('admin.buying_price')}}"
                                              required
                                              data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.currencyCode')}}</label>
                                        <div class="controls">
                                            <input type="text" name="code"
                                              class="form-control"
                                              placeholder="{{__('admin.code')}}" required
                                              data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                        </div>
                                    </div>
                                </div>



                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.is_available')}}
                                            :</label>
                                        {{-- <div class="controls"> --}}
                                        <label class="switch">
                                            <input name="is_available" type="checkbox"
                                              value="1" />
                                            <span class="slider round"></span>
                                        </label>
                                        {{-- </div> --}}
                                    </div>
                                </div>



                                <div class="col-12 d-flex justify-content-center mt-3">
                                    <button type="submit"
                                      class="btn btn-primary mr-1 mb-1 submit_button">{{__('admin.add')}}</button>
                                    <a href="{{ url()->previous() }}" type="reset"
                                      class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</form>

@endsection
@section('js')
<script
  src="{{asset('admin/app-assets/vendors/js/forms/validation/jqBootstrapValidation.js')}}">
</script>
<script
  src="{{asset('admin/app-assets/js/scripts/forms/validation/form-validation.js')}}">
</script>
<script src="{{asset('admin/app-assets/vendors/js/extensions/sweetalert2.all.min.js')}}">
</script>
<script src="{{asset('admin/app-assets/js/scripts/extensions/sweet-alerts.js')}}">
</script>

{{-- show selected image script --}}
@include('admin.shared.addImage')
{{-- show selected image script --}}

{{-- submit add form script --}}
@include('admin.shared.submitAddForm')
{{-- submit add form script --}}

@endsection