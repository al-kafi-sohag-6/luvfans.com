@extends('admin.layout')

@section('content')
	<h5 class="mb-4 fw-light">
    <a class="text-reset" href="{{ url('panel/admin') }}">{{ __('admin.dashboard') }}</a>
      <i class="bi-chevron-right me-1 fs-6"></i>
      <span class="text-muted">{{ __('general.shop_categories') }} ({{$totalCategories}})</span>

			<a href="{{ url('panel/admin/shop-categories/add') }}" class="btn btn-sm btn-dark float-lg-end mt-1 mt-lg-0">
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
                     <th class="active">{{ trans('admin.slug') }}</th>
                     <th class="active">{{ trans('admin.actions') }}</th>
                   </tr>
                         </thead>
                         <tbody>
                 @foreach ($categories as $category)
                   <tr>
                     <td>{{ $category->id }}</td>
                     <td>{{ $category->name }}</td>
                     <td>{{ $category->slug }}</td>
                     <td>
                       <div class="d-flex">
                       <a href="{{ url('panel/admin/shop-categories/edit', $category->id)}}" class="btn btn-success rounded-pill btn-sm me-2">
                         <i class="bi-pencil"></i>
                       </a>

                      <form method="POST" action="{{ url('panel/admin/shop-categories/delete', $category->id) }}" accept-charset="UTF-8" class="d-inline-block align-top">
                        @csrf
                        <button class="btn btn-danger rounded-pill btn-sm actionDelete" type="button"><i class="bi-trash-fill"></i></button>
                        </form>
                        </div>
										</td>
                   </tr><!-- /.TR -->
                   @endforeach

								</tbody>
								</table>
							</div><!-- /.box-body -->

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
                    title: '{{ __('general.shop_categories') }}',
                    download: 'open',
                    orientation: 'potrait',
                    pagesize: 'A4',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                },
                {
                    extend: 'print',
                    title: '{{ __('general.shop_categories') }}',
                    exportOptions: {
                        columns: [0, 1, 2]
                    }
                }, 'pageLength'
                ]
        });

    });
</script>

@endsection
