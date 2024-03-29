@extends('admin.layout')

@section('content')
	<h5 class="mb-4 fw-light">
    <a class="text-reset" href="{{ url('panel/admin') }}">{{ __('admin.dashboard') }}</a>
      <i class="bi-chevron-right me-1 fs-6"></i>
      <span class="text-muted">{{ __('general.products') }} ({{$data->count()}})</span>
  </h5>

<div class="content">
	<div class="row">

		<div class="col-lg-12">

			<div class="card shadow-custom border-0">
				<div class="card-body p-lg-4">

					<div class="table-responsive p-0">
						<table class="table table-hover" id="dataTable">
						 <thead>

                  <tr>
                     <th class="active">ID</th>
										 <th class="active">{{ trans('general.item') }}</th>
										 <th class="active">{{ trans('general.creator') }}</th>
										 <th class="active">{{trans('admin.type')}}</th>
										 <th class="active">{{trans('general.price')}}</th>
										 <th class="active">{{trans('general.sales')}}</th>
										 <th class="active">{{ trans('admin.date') }}</th>
										 <th class="active">{{ trans('admin.actions') }}</th>
                   </tr>
                         </thead>
                         <tbody>
                 @foreach ($data as $product)
									 <tr>
										 <td>{{ $product->id }}</td>
										 <td>
											 <a href="{{url('shop/product', $product->id)}}" target="_blank">
												 {{ Str::limit($product->name, 25, '...') }} <i class="fa fa-external-link-alt"></i>
											 </a>
											 </td>
										 <td>
											 @if (isset($product->user()->username))
											 <a href="{{url($product->user()->username)}}" target="_blank">
												 {{$product->user()->name}} <i class="fa fa-external-link-alt"></i>
											 </a>
										 @else
											 <em>{{ trans('general.no_available') }}</em>
										 @endif
										 </td>
										 <td>{!! $product->type == 'digital' ? '<a href="'.url('product/download', $product->id).'">'. __('general.digital_download').'</a>' : (($product->type == 'physical') ? __('general.physical_products') : __('general.custom_content')) !!}</td>

										 <td>{{ Helper::amountFormatDecimal($product->price) }}</td>
										 <td>{{ $product->purchases->count() }}</td>
										 <td>{{date($settings->date_format, strtotime($product->created_at))}}</td>

										 <td>
											 {!! Form::open([
												 'method' => 'POST',
												 'url' => url('panel/admin/product/delete', $product->id),
												 'class' => 'displayInline'
											 ]) !!}

											 {!! Form::button('<i class="bi-trash-fill"></i>', ['class' => 'btn btn-danger rounded-pill btn-sm actionDelete']) !!}
											 {!! Form::close() !!}
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
                    title: '{{ __('general.products') }}',
                    download: 'open',
                    orientation: 'potrait',
                    pagesize: 'A4',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'print',
                    title: '{{ __('general.products') }}',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                }, 'pageLength'
                ]
        });

    });
</script>

@endsection
