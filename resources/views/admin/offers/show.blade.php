@extends('admin.layout.master')

@section('content')
<form class="store form-horizontal">
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
                                        <input type="file" accept="image/*" name="image"
                                          class="imageUploader">
                                    </label>
                                    <div class="uploadedBlock">
                                        <img src="{{$offer->image}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card">
                    {{-- <div class="card-header">
                    <h4 class="card-title">{{__('admin.show')}}</h4>
                </div> --}}
                <div class="card-content">
                    <div class="card-body">
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
                                                          value="{{$offer->getTranslations('title')[$lang]??''}}"
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
                                                          rows="10">{{$offer->getTranslations('description')[$lang]??''}}</textarea>
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
                                          for="first-name-column">{{__('admin.is_available')}}
                                            :</label>
                                        {{-- <div class="controls"> --}}
                                        <label class="switch">
                                            <input name="is_available" type="checkbox"
                                              value="1"
                                              {{$offer->is_available == 1 ? 'checked' : ''}} />
                                            <span class="slider round"></span>
                                        </label>
                                        {{-- </div> --}}
                                    </div>
                                </div>

                                <div class="col-12 d-flex justify-content-center mt-3">
                                    <a href="{{ url()->previous() }}" type="reset"
                                      class="btn btn-outline-warning mr-1 mb-1">{{ __('admin.back') }}</a>
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
<script>
    $('.store input').attr('disabled' , true)
        $('.store textarea').attr('disabled' , true)
        $('.store select').attr('disabled' , true)

</script>
@endsection