@extends('admin.layout')

@section('content')
<h5 class="mb-4 fw-light">
    <a class="text-reset" href="{{ url('panel/admin') }}">{{ __('admin.dashboard') }}</a>
    <i class="bi-chevron-right me-1 fs-6"></i>
    <span class="text-muted">{{ __('admin.restrictions') }}</span>
</h5>

<div class="content">
    <div class="row">

        <div class="col-lg-12">

            @include('errors.errors-forms')
            @if (session('success_message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check2 me-1"></i> {{ session('success_message') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            @endif
            <div class="card shadow-custom border-0">
                <div class="card-body p-lg-5">

                    <form method="post" action="{{ url('panel/admin/settings/restrictions') }}" enctype="multipart/form-data">
                        @csrf


                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-labe text-lg-end">{{ __('general.post_restriction') }}</label>
                            <div class="col-sm-10">
                                <textarea name="post_restrictions" class="form-control" rows="10">{{ implode('; ', $posts->toArray()) }}</textarea>
                                <small class="d-block">{{ __('general.restriction_notice') }}</small>
                            </div>

                            @if ($errors->has('post_restrictions'))
                            <span class="text-danger">{{ $errors->first('post_restrictions') }}</span>
                            @endif

                        </div><!-- end row -->

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-labe text-lg-end">{{ __('general.comment_restriction') }}</label>
                            <div class="col-sm-10">
                                <textarea name="comment_restriction" class="form-control" rows="10">{{ implode('; ', $comments->toArray()) }}</textarea>
                                <small class="d-block">{{ __('general.restriction_notice') }}</small>
                            </div>

                            @if ($errors->has('comment_restriction'))
                            <span class="text-danger">{{ $errors->first('comment_restriction') }}</span>
                            @endif

                        </div><!-- end row -->

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-labe text-lg-end">{{ __('general.message_restriction') }}</label>
                            <div class="col-sm-10">
                                <textarea name="message_restriction" class="form-control" rows="10">{{ implode('; ', $messages->toArray()) }}</textarea>
                                <small class="d-block">{{ __('general.restriction_notice') }}</small>
                            </div>

                            @if ($errors->has('message_restriction'))
                            <span class="text-danger">{{ $errors->first('message_restriction') }}</span>
                            @endif

                        </div><!-- end row -->

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

<script type="text/javascript">
    $(document).ready(function() {
        $('textarea').on('keydown', function(event) {
            if (event.keyCode === 13) { // Enter key
                var currentValue = $(this).val();
                $(this).val(currentValue + '; ');
                event.preventDefault(); // Prevent the default behavior of the Enter key
            }
        });
    });

</script>
@endsection
