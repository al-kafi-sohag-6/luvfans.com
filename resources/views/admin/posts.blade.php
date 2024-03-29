@extends('admin.layout')

@section('content')
	<h5 class="mb-4 fw-light">
    <a class="text-reset" href="{{ url('panel/admin') }}">{{ __('admin.dashboard') }}</a>
      <i class="bi-chevron-right me-1 fs-6"></i>
      <span class="text-muted">{{ __('general.posts') }} ({{$data->count()}})</span>
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
					<div class="d-lg-flex justify-content-lg-between align-items-center mb-2 w-100">
						<form action="{{ url('panel/admin/posts') }}" id="formSort" method="get">
							 <select name="sort" id="sort" class="form-select d-inline-block w-auto filter">
									<option @if ($sort == '') selected="selected" @endif value="">{{ trans('admin.sort_id') }}</option>
									<option @if ($sort == 'pending') selected="selected" @endif value="pending">{{ trans('admin.pending') }}</option>
								</select>
								</form><!-- form -->
						</div>

					<div class="table-responsive p-0">
						<table class="table table-hover" id="dataTable">
						 <thead>

								 <tr>
									  <th class="active">ID</th>
										<th class="active">{{ trans('admin.description') }}</th>
										<th class="active">{{ trans('admin.content') }}</th>
										<th class="active">{{ trans('admin.type') }}</th>
										<th class="active">{{ trans('general.creator') }}</th>
										<th class="active">{{ trans('admin.date') }}</th>
										<th class="active">{{ trans('admin.status') }}</th>
										<th class="active">{{ trans('admin.actions') }}</th>
									</tr>
                         </thead>
                         <tbody>
								@foreach ($data as $post)

									@php
										$allFiles = $post->media()->groupBy('type')->get();
									@endphp

									<tr>
										<td>{{ $post->id }}</td>
										<td>{{ str_limit(strip_tags($post->description), 40, '...') }}</td>

										<td>
											@if ($allFiles->count() != 0)
												@foreach ($allFiles as $media)

													@if ($media->type == 'image')
														<i class="far fa-image myicon-right"></i>
													@endif

													@if ($media->type == 'video')
														<i class="far fa-play-circle myicon-right"></i>
													@endif

													@if ($media->type == 'music')
														<i class="fa fa-microphone myicon-right"></i>
														@endif

														@if ($media->type == 'file')
													<i class="far fa-file-archive"></i>
													@endif

												@endforeach

											@else
												<i class="fa fa-font"></i>
											@endif
										</td>

										<td>{{ $post->locked == 'yes' ? __('users.content_locked') : __('general.public') }}</td>
										<td>
											@if (isset($post->user()->username))
												<a href="{{url($post->user()->username)}}" target="_blank">
													{{$post->user()->username}} <i class="fa fa-external-link-square-alt"></i>
												</a>
											@else
												<em>{{ trans('general.no_available') }}</em>
											@endif

											</td>
										<td>{{ Helper::formatDate($post->date) }}</td>
										<td>
											<span class="rounded-pill badge bg-{{ $post->status == 'active' ? 'success' : ($post->status == 'pending' ? 'warning' : 'info') }}">
												{{ $post->status == 'active' ? trans('admin.active') :  ($post->status == 'pending' ? trans('admin.pending') : trans('general.encode')) }}
											</span>
											</td>
										<td>
											<div class="d-flex">
											@if (isset($post->user()->username) && $post->status != 'encode')
											<a href="{{ url($post->user()->username, 'post').'/'.$post->id }}" target="_blank" class="btn btn-success btn-sm rounded-pill me-2" title="{{ trans('admin.view') }}">
												<i class="bi-eye"></i>
											</a>
										@endif

											@if ($post->status == 'pending')
											{!! Form::open([
												'method' => 'POST',
												'url' => "panel/admin/posts/approve/$post->id",
												'class' => 'displayInline'
											]) !!}

											{!! Form::button(trans('admin.approve'), ['class' => 'btn btn-success btn-sm padding-btn rounded-pill me-2 actionApprovePost']) !!}
											{!! Form::close() !!}
											@endif

										 {!! Form::open([
											 'method' => 'POST',
											 'url' => "panel/admin/posts/delete/$post->id",
											 'class' => 'displayInline'
										 ]) !!}

										 @if ($post->status == 'active' || $post->status == 'encode')
											 {!! Form::button('<i class="bi-trash-fill"></i>', ['class' => 'btn btn-danger btn-sm padding-btn rounded-pill actionDelete']) !!}

										 @else
											 {!! Form::button(trans('general.reject'), ['class' => 'btn btn-danger btn-sm padding-btn rounded-pill actionDeletePost']) !!}
										 @endif

										 {!! Form::close() !!}

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
                    title: '{{ __('general.posts') }}',
                    download: 'open',
                    orientation: 'potrait',
                    pagesize: 'A4',
                    exportOptions: {
                        columns: [0, 1, 3, 4, 5, 6]
                    }
                },
                {
                    extend: 'print',
                    title: '{{ __('general.posts') }}',
                    exportOptions: {
                        columns: [0, 1, 3, 4, 5, 6]
                    }
                }, 'pageLength'
                ]
        });

    });
</script>

@endsection
