<script>
  var iterval = `
  <span id="ttt">

  <div class="row">

    <div class="col-md-4 col-12">
      <div class="form-group">
        <label for="first-name-column">{{ __('admin.from') }}</label>
        <div class="controls">
          <select name="from_id[]" class="select2 form-control" required
            data-validation-required-message="{{ __('admin.this_field_is_required') }}">
            <option value>{{ __('admin.from') }}</option>
            @foreach ($times as $time)
            <option value="{{ $time->id }}">{{ $time->name }}
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
            <option value="{{ $time->id }}">{{ $time->name }}
            </option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-2 mb-3">
        <label>{{__('admin.delete')}}</label>
        <span class="btn btn-danger mb-2 removeInterval"
          style="display: block;width: 100%;"
          type="submit">{{__('admin.delete')}} <i
              class="fa fa-trash"></i> </span>
    </div>

  </div>

  </span>
  `;


  $('#addNewInterval').on('click', function() {
      $('#newIntervalSection').append(iterval);
  });

  $('body').on('click', '.removeInterval', function(e) {
      e.preventDefault();
      $(this).closest('#ttt').remove();
  });
</script>