<script>
    $(document).on('click' , '.delete-row', function (e) {
        e.preventDefault()
        Swal.fire({
            title: "{{__('هل تريد الاستمرار ؟')}}",
            text: "{{__('هل انت متأكد انك تريد استكمال عملية الحذف')}}",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '{{__('admin.confirm')}}',
            confirmButtonClass: 'btn btn-primary',
            cancelButtonText: '{{__('admin.cancel')}}',
            cancelButtonClass: 'btn btn-danger ml-1',
            buttonsStyling: false,
            }).then( (result) => {
            if (result.value) {
                $.ajax({
                    type: "delete",
                    url: $(this).data('url'),
                    data: {},
                    dataType: "json",
                    success:  (response) => {
                        Swal.fire(
                        {
                            position: 'top-start',
                            type: 'success',
                            title: '{{__('admin.the_selected_has_been_successfully_deleted')}}',
                            showConfirmButton: false,
                            timer: 1500,
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        })
                        getData({'searchArray' : searchArray()} )
                        // toastr.error()
                        // $('.data-list-view').DataTable().row($(this).closest('td').parent('tr')).remove().draw();
                    }
                });
            }
        })
    });

    $(document).on('click' , '.delete-iterval', function (e) {

        console.log($(this).data('url'));
        e.preventDefault()
        var _token    = $("meta[name='csrf-token']").attr("content");
        Swal.fire({
                title: "{{__('هل تريد الاستمرار ؟')}}",
                text: "{{__('هل انت متأكد انك تريد استكمال عملية الحذف')}}",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "{{__('admin.confirm')}}",
                confirmButtonClass: 'btn btn-primary',
                cancelButtonText: "{{__('admin.cancel')}}",
                cancelButtonClass: 'btn btn-danger ml-1',
                buttonsStyling: false,
        }).then( (result) => {
                    if (result) {
                console.log(_token);
                $.ajax({
                    type: "delete",
                    url: $(this).data('url'),
                    data: {
                        _token:_token
                    },
                    dataType: "json",
                    success:  (response) => {
                    Swal.fire(
                        {
                            position: 'top-start',
                            type: 'success',
                            title: '{{__('admin.the_selected_has_been_successfully_deleted')}}',
                            showConfirmButton: false,
                            timer: 1500,
                            confirmButtonClass: 'btn btn-primary',
                            buttonsStyling: false,
                        })
                        // toastr.error()
                        $(this).closest('.targetInterval').remove().draw();
                    }
                });
            }
        })
        
    });
</script>