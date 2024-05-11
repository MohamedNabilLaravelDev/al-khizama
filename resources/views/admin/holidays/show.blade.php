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
                                                      for="first-name-column">{{__('admin.title')}}
                                                        {{ $lang }}</label>
                                                    <div class="controls">
                                                        <input type="text"
                                                          value="{{$holiday->getTranslations('title')[$lang]??''}}"
                                                          name="title[{{$lang}}]"
                                                          class="form-control"
                                                          placeholder="{{__('admin.write') . __('admin.title')}} {{ $lang }}"
                                                          required
                                                          data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-12">
                                                <div class="form-group">
                                                    <label
                                                      for="first-name-column">{{__('admin.description')}}
                                                        {{ $lang }}</label>
                                                    <div class="controls">
                                                        <textarea
                                                          name="description[{{ $lang }}]"
                                                          class="form-control" cols="30"
                                                          rows="10">{{$holiday->getTranslations('description')[$lang]??''}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    {{-- to create languages tabs uncomment that --}}
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.date')}}
                                            {{ $lang }}</label>
                                        <div class="controls">
                                            <input type="date" name="date"
                                              class="form-control" required
                                              value="{{$holiday->date}}"
                                              data-validation-required-message="{{__('admin.this_field_is_required')}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group">
                                        <label
                                          for="first-name-column">{{__('admin.is_active')}}
                                            :</label>
                                        {{-- <div class="controls"> --}}
                                        <label class="switch">
                                            <input name="is_active" type="checkbox"
                                              value="1"
                                              {{$holiday->is_active == 1 ? 'checked' : ''}} />
                                            <span class="slider round"></span>
                                        </label>
                                        {{-- </div> --}}
                                    </div>
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