<div class="position-relative">
    {{-- table loader  --}}
    {{-- <div class="table_loader" >
        {{__('admin.loading')}}
</div> --}}
{{-- table loader  --}}

{{-- table content --}}
<table class="table " id="tab">
    <thead>
        <tr>
            <th>
                <label class="container-checkbox">
                    <input type="checkbox" value="value1" name="name1" id="checkedAll">
                    <span class="checkmark"></span>
                </label>
            </th>
            <th>{{__('admin.country_flag')}}</th>
            <th>{{__('admin.country_name')}}</th>
            <th>{{__('admin.code')}}</th>
            <th>{{__('admin.selling_price')}}</th>
            <th>{{__('admin.buying_price')}}</th>
            <th>{{__('admin.is_available')}}</th>
            <th>{{__('admin.control')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($currencies as $currency)
        <tr class="delete_row">
            <td class="text-center">
                <label class="container-checkbox">
                    <input type="checkbox" class="checkSingle" id="{{ $currency->id }}">
                    <span class="checkmark"></span>
                </label>
            </td>
            <td><img src="{{$currency->country_flag}}" width="30px" height="30px" alt="">
            </td>
            <td>{{ $currency->country_name }}</td>
            <td>{{ $currency->code }}</td>
            <td>{{ $currency->selling_price }}</td>
            <td>{{ $currency->buying_price }}</td>
            <td>
                @if (!$currency->is_available)
                <span class="btn btn-sm round btn-outline-danger">
                    {{ __('admin.unavailable') }} <i
                      class="la la-close font-medium-2"></i>
                </span>
                @else
                <span class="btn btn-sm round btn-outline-success">
                    {{ __('admin.available') }} <i class="la la-check font-medium-2"></i>
                </span>
                @endif
            </td>

            <td class="product-action">
                <span class="text-primary"><a
                      href="{{ route('admin.currencies.show', ['id' => $currency->id]) }}"
                      class="btn btn-warning btn-sm"><i class="feather icon-eye"></i>
                        {{ __('admin.show') }}</a></span>
                <span class="action-edit text-primary"><a
                      href="{{ route('admin.currencies.edit', ['id' => $currency->id]) }}"
                      class="btn btn-primary btn-sm"><i
                          class="feather icon-edit"></i>{{ __('admin.edit') }}</a></span>
                <span class="delete-row btn btn-danger btn-sm"
                  data-url="{{ url('admin/currencies/' . $currency->id) }}"><i
                      class="feather icon-trash"></i>{{ __('admin.delete') }}</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- table content --}}
{{-- no data found div --}}
@if ($currencies->count() == 0)
<div class="d-flex flex-column w-100 align-center mt-4">
    <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
    <span class="mt-2"
      style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
</div>
@endif
{{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($currencies->count() > 0 && $currencies instanceof
\Illuminate\Pagination\AbstractPaginator )
<div class="d-flex justify-content-center mt-3">
    {{$currencies->links()}}
</div>
@endif
{{-- pagination  links div --}}