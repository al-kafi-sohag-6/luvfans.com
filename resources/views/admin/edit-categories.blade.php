@extends('admin.layout')

@section('content')
<h5 class="mb-4 fw-light">
    <a class="text-reset" href="{{ url('panel/admin') }}">{{ __('admin.dashboard') }}</a>
    <i class="bi-chevron-right me-1 fs-6"></i>
    <a class="text-reset" href="{{ url('panel/admin/categories') }}">{{ __('general.categories') }}</a>
    <i class="bi-chevron-right me-1 fs-6"></i>
    <span class="text-muted">{{ __('admin.edit') }}</span>
</h5>

<div class="content">
    <div class="row">

        <div class="col-lg-12">

            @include('errors.errors-forms')

            <div class="card shadow-custom border-0">
                <div class="card-body p-lg-5">

                    <form method="post" action="{{ url('panel/admin/categories/update') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $categories->id }}">

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-lg-end">{{ trans('admin.name') }}</label>
                            <div class="col-sm-10">
                                <input value="{{ $categories->name }}" name="name" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-lg-end">{{ trans('admin.slug') }}</label>
                            <div class="col-sm-10">
                                <input value="{{ $categories->slug }}" name="slug" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-lg-end">{{ trans('admin.keywords') }} (SEO)</label>
                            <div class="col-sm-10">
                                <input value="{{ $categories->keywords }}" name="keywords" type="text" class="form-control">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-labe text-lg-end">{{ __('admin.description') }}</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" rows="4">{{ $categories->description }}</textarea>
                            </div>
                        </div>

                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0 text-lg-end">{{ trans('admin.status') }}</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-switch form-switch-md">
                                    <input class="form-check-input" type="checkbox" name="mode" @if ($categories->mode == 'on') checked="checked" @endif value="on" role="switch">
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="row mb-3">
                            <legend class="col-form-label col-sm-2 pt-0 text-lg-end">{{ trans('admin.search') }}</legend>
                            <div class="col-sm-10">
                                <div class="form-check form-switch form-switch-md">
                                    <input class="form-check-input" type="checkbox" name="search" @if ($categories->search == 'on') checked="checked" @endif value="on" role="switch">
                                </div>
                            </div>
                        </fieldset>

                        <!-- end row -->

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label text-lg-end">{{ trans('admin.thumbnail') }} ({{trans('general.optional')}})</label>
                            <div class="col-lg-5 col-sm-10">
                                <div style="max-width: 150px; height: 150px; margin-bottom: 10px; display: block; border-radius: 6px; background: #505050 @if ($categories->image) url('{{ Helper::getFile(config('path.category').$categories->image) }}') no-repeat center center; background-size: cover; @endif ;">
                                </div>
                                <div class="input-group mb-1">
                                    <input name="thumbnail" type="file" class="form-control custom-file rounded-pill">
                                </div>
                                <small class="d-block">{{ trans('admin.thumbnail_desc') }}</small>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10 offset-sm-2">
                                <button type="submit" class="btn btn-dark mt-3 px-5">{{ __('admin.save') }}</button>
                            </div>
                        </div>

                    </form>

                </div><!-- card-body -->
            </div><!-- card  -->
        </div><!-- col-lg-12 -->

    </div><!-- end row -->
</div><!-- end content -->
@endsection

@section('javascript')

<script type="text/javascript"></script>
@endsection
