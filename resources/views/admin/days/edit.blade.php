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
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
  <div class="row match-height">
    <div class="col-12">
      <div class="card">
        {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.update') . ' ' . __('admin.day')}}
        </h4>
      </div> --}}
      <div class="card-content">
        <div class="card-body">
          <form method="POST" action="{{route('admin.days.update' , ['id' => $day->id])}}"
            class="store form-horizontal" novalidate>
            @csrf
            @method('PUT')
            <div class="form-body">
              <div class="row">
                <div class="col-md-12 col-12">
                  <div class="form-group">
                    <label for="first-name-column">{{__('admin.name')}}</label>
                    <div class="controls">
                      <input type="text" name="name" value="{{$day->name}}"
                        class="form-control" placeholder="{{__('admin.name')}}" disabled>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-12 col-12">
                <div class="form-group">
                  <label for="first-name-column">{{__('admin.is_available')}}
                    :</label>
                  {{-- <div class="controls"> --}}
                  <label class="switch">
                    <input name="is_available" type="checkbox" value="1"
                      {{$day->is_available == 1 ? 'checked' : ''}} />
                    <span class="slider round"></span>
                  </label>
                  {{-- </div> --}}
                </div>
              </div>

              @if (count($day->dayIntervals) > 0)

              @foreach ($day->dayIntervals as $interval)
              <div class="row targetInterval">

                <div class="col-md-4 col-12">
                  <div class="form-group">
                    <label for="first-name-column">{{ __('admin.from') }}</label>
                    <div class="controls">
                      <select name="from_id[]" class="select2 form-control" required
                        data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                        <option value>{{ __('admin.from') }}</option>
                        @foreach ($times as $time)
                        <option {{ $time->id == $interval->from_id ? 'selected' : '' }}
                          value="{{ $time->id }}">{{ $time->name }}
                        </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                <div class="col-md-4 col-12">
                  <div class="form-group">
                    <label for="first-name-column">{{ __('admin.to') }}</label>
                    <div class="controls">
                      <select name="to_id[]" class="select2 form-control" required
                        data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                        <option value>{{ __('admin.to') }}</option>
                        @foreach ($times as $time)
                        <option {{ $time->id == $interval->to_id ? 'selected' : '' }}
                          value="{{ $time->id }}">{{ $time->name }}
                        </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>

                @if (Route::is('*.edit'))
                <div class="col-md-2 mb-3">
                  <label>{{__('admin.delete')}}</label>
                  <span class="btn btn-danger mb-2 delete-iterval"
                    style="display: block;width: 100%;"
                    data-url="{{isset($interval) ? url('admin/delete-interval/'.$interval->id) : ''}}"
                    type="submit">{{__('admin.delete')}} <i class="fa fa-trash"></i>
                  </span>
                </div>
                @endif

              </div>

              @endforeach

              @endif


              <span id="newIntervalSection">

              </span>

              <button type="button" class="btn btn-block btn-xs  btn-primary mr-1 mb-1"
                id="addNewInterval">
                {{ __('admin.add_new_interval') }}
              </button>

              <div class="col-12 d-flex justify-content-center mt-3">
                <button type="submit"
                  class="btn btn-primary mr-1 mb-1 submit_button">{{__('admin.update')}}</button>
                <a href="{{ url()->previous() }}" type="reset"
                  class="btn btn-outline-warning mr-1 mb-1">{{__('admin.back')}}</a>
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

@include('admin.shared.deleteOne')


{{-- show selected image script --}}
@include('admin.shared.addImage')
{{-- show selected image script --}}

@include('admin.days.ajax')

{{-- submit edit form script --}}
@include('admin.shared.submitEditForm')
{{-- submit edit form script --}}

@endsection