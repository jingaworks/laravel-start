@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.place.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Place">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.place.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.denloc') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.codp') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.sirsup') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.tip') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.zona') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.niv') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.med') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.regiune') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.fsj') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.fs_2') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.fs_3') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.fsl') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.rang') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.fictiv') }}
                        </th>
                        <th>
                            {{ trans('cruds.place.fields.region') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($places as $key => $place)
                        <tr data-entry-id="{{ $place->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $place->id ?? '' }}
                            </td>
                            <td>
                                {{ $place->denloc ?? '' }}
                            </td>
                            <td>
                                {{ $place->codp ?? '' }}
                            </td>
                            <td>
                                {{ $place->sirsup ?? '' }}
                            </td>
                            <td>
                                {{ $place->tip ?? '' }}
                            </td>
                            <td>
                                {{ $place->zona ?? '' }}
                            </td>
                            <td>
                                {{ $place->niv ?? '' }}
                            </td>
                            <td>
                                {{ $place->med ?? '' }}
                            </td>
                            <td>
                                {{ $place->regiune ?? '' }}
                            </td>
                            <td>
                                {{ $place->fsj ?? '' }}
                            </td>
                            <td>
                                {{ $place->fs_2 ?? '' }}
                            </td>
                            <td>
                                {{ $place->fs_3 ?? '' }}
                            </td>
                            <td>
                                {{ $place->fsl ?? '' }}
                            </td>
                            <td>
                                {{ $place->rang ?? '' }}
                            </td>
                            <td>
                                {{ $place->fictiv ?? '' }}
                            </td>
                            <td>
                                {{ $place->region->denj ?? '' }}
                            </td>
                            <td>
                                @can('place_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.places.show', $place->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('place_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.places.edit', $place->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('place_delete')
                                    <form action="{{ route('admin.places.destroy', $place->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('place_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.places.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Place:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection