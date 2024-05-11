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
            <th>{{__('admin.serial')}}</th>
            <th>{{__('admin.sender_name')}}</th>
            <th>{{__('admin.receiver_name')}}</th>
            <th>{{__('admin.total_paid_amount')}}</th>
            <th>{{__('admin.control')}}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($transfertransactions as $transfertransaction)
        <tr class="delete_row">
            <td class="text-center">
                <label class="container-checkbox">
                    <input type="checkbox" class="checkSingle"
                      id="{{ $transfertransaction->id }}">
                    <span class="checkmark"></span>
                </label>
            </td>
            <td>{{ $transfertransaction->serial }}</td>
            <td>{{ $transfertransaction->sender_name }}</td>
            <td>{{ $transfertransaction->receiver_name }}</td>
            <td>{{ $transfertransaction->total_paid_amount }}
                {{$transfertransaction->totalPaidCurrencyType->code}}
            </td>
            <td class="product-action">
                <span class="text-primary"><a
                      href="{{ route('admin.transfertransactions.show', ['id' => $transfertransaction->id]) }}"
                      class="btn btn-warning btn-sm"><i class="feather icon-eye"></i>
                        {{ __('admin.show') }}</a></span>
                <span class="delete-row btn btn-danger btn-sm"
                  data-url="{{ url('admin/transfertransactions/' . $transfertransaction->id) }}"><i
                      class="feather icon-trash"></i>{{ __('admin.delete') }}</span>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{-- table content --}}
{{-- no data found div --}}
@if ($transfertransactions->count() == 0)
<div class="d-flex flex-column w-100 align-center mt-4">
    <img src="{{asset('admin/app-assets/images/pages/404.png')}}" alt="">
    <span class="mt-2"
      style="font-family: cairo">{{__('admin.there_are_no_matches_matching')}}</span>
</div>
@endif
{{-- no data found div --}}

</div>
{{-- pagination  links div --}}
@if ($transfertransactions->count() > 0 && $transfertransactions instanceof
\Illuminate\Pagination\AbstractPaginator )
<div class="d-flex justify-content-center mt-3">
    {{$transfertransactions->links()}}
</div>
@endif
{{-- pagination  links div --}}