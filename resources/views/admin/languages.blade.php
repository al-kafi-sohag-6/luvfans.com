@extends('admin.layout')

@section('content')
	<h5 class="mb-4 fw-light">
    <a class="text-reset" href="{{ url('panel/admin') }}">{{ __('admin.dashboard') }}</a>
      <i class="bi-chevron-right me-1 fs-6"></i>
      <span class="text-muted">{{ __('admin.languages') }}</span>

      <a href="{{ url('panel/admin/languages/create') }}" class="btn btn-sm btn-dark float-lg-end mt-1 mt-lg-0">
				<i class="bi-plus-lg"></i> {{ trans('general.add_new') }}
			</a>
  </h5>

<div class="content">
	<div class="row">

		<div class="col-lg-12">

			@if (session('success_message'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
              <i class="bi bi-check2 me-1"></i>	{{ session('success_message') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  <i class="bi bi-x-lg"></i>
                </button>
                </div>
              @endif

			<div class="card shadow-custom border-0">
				<div class="card-body p-lg-4">

          <div class="table-responsive p-0">
            <table class="table table-hover" id="dataTable">
             <thead>
                 <tr>
                    <th class="active">ID</th>
                    <th class="active">{{ trans('admin.name') }}</th>
                    <th class="active">{{ trans('admin.abbreviation') }}</th>
                    <th class="active">{{ trans('admin.actions') }}</th>
                  </tr>
             </thead>
             <tbody>
                @foreach( $data as $lang )
                  <tr>
                    <td>{{ $lang->id }}</td>
                    <td>{{ $lang->name }}</td>
                    <td>{{ strtolower($lang->abbreviation) }}</td>
                    <td>
                      <a href="{{ url('panel/admin/languages/edit', $lang->id) }}" class="btn btn-success rounded-pill btn-sm me-2">
                        <i class="bi-pencil"></i>
                      </a>

                   @if ($data->count() != 1)

                     {!! Form::open([
                    'method' => 'POST',
                    'url' => url('panel/admin/languages', $lang->id),
                    'id' => 'form'.$lang->id,
                    'class' => 'd-inline-block align-top'
                  ]) !!}
                  {!! Form::button('<i class="bi-trash-fill"></i>', ['data-url' => $lang->id, 'class' => 'btn btn-danger rounded-pill btn-sm actionDelete']) !!}
              {!! Form::close() !!}
                    @endif

                  </td>

                  </tr><!-- /.TR -->
                  @endforeach

                </tbody>
              </table>
          </div>

				 </div><!-- card-body -->
 			</div><!-- card  -->
 		</div><!-- col-lg-12 -->

	</div><!-- end row -->
</div><!-- end content -->
@endsection

@section('javascript')
<script>
    $( document ).ready(function() {
        let table = new DataTable('#dataTable', {
            dom: 'Bfrtip',
                buttons: [{
                    extend: 'pdfHtml5',
                    title: '{{ __('admin.languages') }}',
                    download: 'open',
                    orientation: 'potrait',
                    pagesize: 'A4',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'print',
                    title: '{{ __('admin.languages') }}',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                }, 'pageLength'
                ]
        });

    });
</script>

@endsection
