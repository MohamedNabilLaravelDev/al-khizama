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
            <th>{{__('admin.title')}}</th>
            <th>{{__('admin.date')}}</th>
            <th>{{__('admin.is_active')}}</th>
            <th>{{__('admin.control')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($holidays as $holiday)
        <tr class="delete_row">
            <td class="text-center">
                <label class="container-checkbox">
                    <input type="checkbox" class="checkSingle" id="{{ $holiday->id }}">
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>{{ $holiday->title }}</td>
            <td>{{ $holiday->date }}</td>
            <td>
                @if (!$holiday->is_active)
                <span class="btn btn-sm round btn-outline-danger">
                    {{ __('admin.enactive') }} <i class="la la-close font-medium-2"></i>
                </span>
                @else
                <span class="btn btn-sm round btn-outline-success">
                    {{ __('admin.active') }} <i class="la la-check font-medium-2"></i>
                </span>
                @endif
            </td>

            <td class="product-action">
                <span class="text-primary"><a
                      href="{{ route('admin.holidays.show', ['id' => $holiday->id]) }}"
                      class="btn btn-warning btn-sm"><i class="feather icon-eye"></i>
                        {{ __('admin.show') }}</a></span>
                <span class="action-edit text-primary"><a
                      href="{{ route('admin.holidays.edit', ['id' => $holiday->id]) }}"
                      class="btn btn-primary btn-sm"><i
                          class="feather icon-edit"></i>{{ __('admin.edit') }}</a></span>
                <span class="delete-row btn btn-danger btn-sm"
                  data-url="{{ url('admin/holidays/' . $holiday->id) }}"><i
                      class="feather icon-trash"></i>{{ __('admin.delete') }}</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- table content --}}
{{-- no data found div --}}
@if ($holidays->count() == 0)
<div class="d-flex flex-column w-100 align-center mt-4">
    <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
    <span class="mt-2"
      style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
</div>
@endif
{{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($holidays->count() > 0 && $holidays instanceof
\Illuminate\Pagination\AbstractPaginator )
<div class="d-flex justify-content-center mt-3">
    {{$holidays->links()}}
</div>
@endif
{{-- pagination  links div --}}