@extends('admin.layout')

@section('content')
	<h5 class="mb-4 fw-light">
    <a class="text-reset" href="{{ url('panel/admin') }}">{{ __('admin.dashboard') }}</a>
      <i class="bi-chevron-right me-1 fs-6"></i>
      <span class="text-muted">{{ __('general.referrals') }} ({{$data->count()}})</span>
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
										 <th class="active">{{ trans('admin.user') }}</th>
										 <th class="active">{{ trans('general.referred_by') }}</th>
										 <th class="active">{{ trans('general.earnings') }}</th>
										 <th class="active">{{ trans('admin.date') }}</th>
                   </tr>
                         </thead>
                         <tbody>
                 @foreach ($data as $referral)
									 <tr>
										 <td>{{ $referral->id }}</td>
										 <td>
											 @if (isset($referral->user()->username))
											 <a href="{{url($referral->user()->username)}}" target="_blank">
												 {{$referral->user()->name}} <i class="fa fa-external-link-alt"></i>
											 </a>
										 @else
											 <em>{{ trans('general.no_available') }}</em>
										 @endif
										 </td>
										 <td>
											 @if (isset($referral->referredBy()->username))
											 <a href="{{url($referral->referredBy()->username)}}" target="_blank">
												 {{$referral->referredBy()->name}} <i class="fa fa-external-link-alt"></i>
											 </a>
										 @else
											 <em>{{ trans('general.no_available') }}</em>
										 @endif
										 </td>
										 <td>{{ Helper::amountFormatDecimal($referral->earnings()) }}</td>
										 <td>{{date($settings->date_format, strtotime($referral->created_at))}}</td>
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
                    title: '{{ __('general.referrals') }}',
                    download: 'open',
                    orientation: 'potrait',
                    pagesize: 'A4',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                },
                {
                    extend: 'print',
                    title: '{{ __('general.referrals') }}',
                    exportOptions: {
                        columns: [0, 1, 2, 3]
                    }
                }, 'pageLength'
                ]
        });

    });
</script>

@endsection
