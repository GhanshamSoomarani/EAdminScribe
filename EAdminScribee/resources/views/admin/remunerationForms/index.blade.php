@extends('layouts.admin')
@section('content')
@can('remuneration_form_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.remuneration-forms.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.remunerationForm.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.remunerationForm.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover datatable datatable-remunerationForm">
                <thead>
                    <tr>
                        <th width="10"></th>
                        <th>{{ trans('cruds.remunerationForm.fields.id') }}</th>
                        @if(!$user->is_user)
                            <th>{{ trans('cruds.remunerationForm.fields.created_by') }}</th>
                        @endif
                        <th>{{ trans('cruds.remunerationForm.fields.total_amount') }}</th>
                        <th>{{ trans('cruds.remunerationForm.fields.net_amount') }}</th>
                        <th>{{ trans('cruds.remunerationForm.fields.created_at') }}</th>
                        <th>{{ trans('cruds.remunerationForm.fields.status') }}</th>
                        @if($user->is_admin || $user->is_user)
                            <th>{{ trans('cruds.remunerationForm.fields.chairman') }}</th>
                            <th>{{ trans('cruds.remunerationForm.fields.dean') }}</th>
                            <th>{{ trans('cruds.remunerationForm.fields.exam_controller') }}</th>
                            <th>{{ trans('cruds.remunerationForm.fields.finance') }}</th>
                        @endif
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($remunerationForms as $remunerationForm)
                        <tr data-entry-id="{{ $remunerationForm->id }}">
                            <td></td>
                            <td>{{ $remunerationForm->id }}</td>
                            @if(!$user->is_user)
                                <td>{{ $remunerationForm->created_by->name ?? '' }}</td>
                            @endif
                            <td>{{ $remunerationForm->total_amount }}</td>
                            <td>{{ $remunerationForm->net_amount }}</td>
                            <td>{{ $remunerationForm->created_at }}</td>
                            <td>{{ $remunerationForm->status->name }}</td>
                            @if($user->is_admin || $user->is_user)
                                <td>{{ $remunerationForm->chairman->name ?? 'N/A' }}</td>
                                <td>{{ $remunerationForm->dean->name ?? 'N/A' }}</td>
                                <td>{{ $remunerationForm->exam_controller->name ?? 'N/A' }}</td>
                                <td>'N/A'</td>
                            @endif
                            <td>
                                @if($user->is_user && in_array($remunerationForm->status_id, [1, 11, 3]))
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.remuneration-forms.showSend', $remunerationForm->id) }}">
                                        Send to
                                        @if($remunerationForm->status_id == 1)
                                            Chairman
                                        @elseif($remunerationForm->status_id == 11)
                                            Dean
                                        @elseif($remunerationForm->status_id == 3)
                                            Exam Controller
                                        @else
                                            Finance
                                        @endif
                                    </a>
                                @elseif(($user->is_chairman && $remunerationForm->status_id == 10) ||
                                        ($user->is_dean && $remunerationForm->status_id == 2) ||
                                        ($user->is_exam_controller && $remunerationForm->status_id == 5) ||
                                        ($user->is_finance && $remunerationForm->status_id == 13))
                                    <a class="btn btn-xs btn-success" href="{{ route('admin.remuneration-forms.showAnalyze', $remunerationForm->id) }}">
                                        Submit Analysis
                                    </a>
                                @endif

                                @can('remuneration_form_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.remuneration-forms.show', $remunerationForm->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @if(Gate::allows('remuneration_form_edit') && in_array($remunerationForm->status_id, [6, 7]))
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.remuneration-forms.edit', $remunerationForm->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endif

                                @can('remuneration_form_delete')
                                    <form action="{{ route('admin.remuneration-forms.destroy', $remunerationForm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        @method('DELETE')
                                        @csrf
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
        @can('remuneration_form_delete')
        let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
        let deleteButton = {
            text: deleteButtonTrans,
            url: "{{ route('admin.remuneration-forms.massDestroy') }}",
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
                        headers: { 'x-csrf-token': _token },
                        method: 'POST',
                        url: config.url,
                        data: { ids: ids, _method: 'DELETE' }
                    })
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
        let table = $('.datatable-remunerationForm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
            $($.fn.dataTable.tables(true)).DataTable()
                .columns.adjust();
        });
    })
</script>
@endsection
