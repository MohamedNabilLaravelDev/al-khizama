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
            <th>{{__('admin.name')}}</th>
            <th>{{__('admin.is_available')}}</th>
            <th>{{__('admin.control')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($days as $day)
        <tr class="delete_row">
            <td>{{ $day->name }}</td>
            <td>
                @if (!$day->is_available)
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
                      href="{{ route('admin.days.show', ['id' => $day->id]) }}"
                      class="btn btn-warning btn-sm"><i class="feather icon-eye"></i>
                        {{ __('admin.show') }}</a></span>
                <span class="action-edit text-primary"><a
                      href="{{ route('admin.days.edit', ['id' => $day->id]) }}"
                      class="btn btn-primary btn-sm"><i
                          class="feather icon-edit"></i>{{ __('admin.edit') }}</a></span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- table content --}}
{{-- no data found div --}}
@if ($days->count() == 0)
<div class="d-flex flex-column w-100 align-center mt-4">
    <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
    <span class="mt-2"
      style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
</div>
@endif
{{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($days->count() > 0 && $days instanceof \Illuminate\Pagination\AbstractPaginator )
<div class="d-flex justify-content-center mt-3">
    {{$days->links()}}
</div>
@endif
{{-- pagination  links div --}}