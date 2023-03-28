<div class="modal fade modalEditPost" id="editPost" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header border-bottom-0">
                <h5 class="modal-title">{{trans('general.edit_post')}}</h5>
                <button type="button" class="close close-inherit" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">
                        <i class="bi bi-x-lg"></i>
                    </span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{url('update/edit')}}" enctype="multipart/form-data" class="formUpdateEdit">
                    @csrf
                    <input type="hidden" id="id" name="id" value="" />
                    <div class="card mb-4">
                        <div class="blocked display-none"></div>
                        <div class="card-body pb-0">
                            <div class="media">
                                <div class="media-body font-weight-normal" style="width: 45%;">
                                    <textarea name="description" id="editDescription" cols="40" placeholder="{{trans('general.write_something')}}" class="form-control border-0 updateDescription custom-scrollbar"></textarea>
                                </div>
                            </div><!-- media -->

                            <input class="custom-control-input d-none customCheckLocked" id="lock_checkbox" type="checkbox" name="locked" value="">

                            <!-- Alert -->
                            <div class="alert alert-danger my-3 display-none errorUdpate">
                                <ul class="list-unstyled m-0 showErrorsUdpate small"></ul>
                            </div><!-- Alert -->
                        </div><!-- card-body -->

                        <div class="card-footer bg-white border-0 pt-0">
                            <div class="justify-content-between align-items-center parent">

                                <div class="form-group price" style="display: none;">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">{{$settings->currency_symbol}}</span>
                                        </div>
                                        <input class="form-control isNumber" id="price" value="null" autocomplete="off" name="price" placeholder="{{trans('general.price')}}" type="text">
                                    </div>
                                </div><!-- End form-group -->

                                <div class="form-group  titlePost" style="display: none;">
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="bi-type"></i></span>
                                        </div>
                                        <input id="title" class="form-control" value="null" maxlength="100" autocomplete="off" name="title" placeholder="{{trans('admin.title')}}" type="text">
                                    </div>
                                    <small class="form-text text-muted mb-4 font-13">
                                        {{ __('general.title_post_info', ['numbers' => 100]) }}
                                    </small>
                                </div>

                                <button type="button" class="btn btn-upload btn-tooltip e-none align-bottom setPrice @if (auth()->user()->dark_mode == 'off') text-primary @else text-white @endif rounded-pill" data-toggle="tooltip" data-placement="top" title="{{trans('general.price_post_ppv')}}" style="display: none">
                                    <i class="feather icon-tag f-size-25"></i>
                                </button>

                                <button type="button" class="contentLocked btn e-none align-bottom @if (auth()->user()->dark_mode == 'off') text-primary @else text-white @endif rounded-pill btn-upload btn-tooltip " data-toggle="tooltip" data-placement="top" title="{{trans('users.locked_content')}}" style="display: none">
                                    <i class="feather f-size-25"></i>
                                </button>

                                <button type="button" class="btn btn-upload btn-tooltip e-none align-bottom setTitle @if (auth()->user()->dark_mode == 'off') text-primary @else text-white @endif rounded-pill" data-toggle="tooltip" data-placement="top" title="{{trans('general.title_post_block')}}" style="display: none;">
                                    <i class="bi-type f-size-25"></i>
                                </button>

                                <button type="button" data-bs-auto-close="inside"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="emoji-edit-button" class="emoji-edit-button btn btn-upload p-bottom-8 btn-tooltip-form e-none align-bottom @if (auth()->user()->dark_mode == 'off') text-primary @else text-white @endif rounded-pill">
                                    <i class="bi-emoji-smile f-size-25"></i>
                                </button>
                                @include('includes.emoji', ['target' => 'emoji-edit-button', 'extra_class' => 'emoji-picker-edit'])

                                <div class="d-inline-block float-right mt-3">
                                    <button type="submit" id="btnEditUpdate" class="btn btn-sm btn-primary rounded-pill float-right btnEditUpdate"><i></i> {{trans('users.save')}}</button>
                                </div>

                            </div>
                        </div><!-- card footer -->
                    </div><!-- card -->
                </form>
            </div><!-- modal-body -->
        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->
