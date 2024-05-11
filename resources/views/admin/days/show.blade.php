@extends('admin.layout.master')

@section('content')
<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.view') . ' ' . __('admin.day')}}
                </h4>
            </div> --}}
            <div class="card-content">
                <div class="card-body">
                    <form class="show form-horizontal">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.name')}}</label>
                                        <div class="controls">
                                            <input type="text" name="name"
                                              value="{{$day->name}}" class="form-control"
                                              placeholder="{{__('admin.name')}}" required
                                              data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                        </div>
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
                                          value="1"
                                          {{$day->is_available == 1 ? 'checked' : ''}} />
                                        <span class="slider round"></span>
                                    </label>
                                    {{-- </div> --}}
                                </div>
                            </div>

                            @if (count($day->dayIntervals) > 0)

                            @foreach ($day->dayIntervals as $interval)
                            <div class="row targetInterval">

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{ __('admin.from') }}</label>
                                        <div class="controls">
                                            <select name="from[]"
                                              class="select2 form-control" required
                                              data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                <option value>{{ __('admin.from') }}
                                                </option>
                                                @foreach ($times as $time)
                                                <option
                                                  {{ $time->id == $interval->from_id ? 'selected' : '' }}
                                                  value="{{ $time->id }}">
                                                    {{ $time->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{ __('admin.to') }}</label>
                                        <div class="controls">
                                            <select name="to[]"
                                              class="select2 form-control" required
                                              data-validation-required-message="{{ __('admin.this_field_is_required') }}">
                                                <option value>{{ __('admin.to') }}
                                                </option>
                                                @foreach ($times as $time)
                                                <option
                                                  {{ $time->id == $interval->to_id ? 'selected' : '' }}
                                                  value="{{ $time->id }}">
                                                    {{ $time->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            @endforeach

                            @endif
                            <div class="col-12 d-flex justify-content-center mt-3">
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
<script>
    $('.show input').attr('disabled' , true)
        $('.show textarea').attr('disabled' , true)
        $('.show select').attr('disabled' , true)
</script>
@endsection