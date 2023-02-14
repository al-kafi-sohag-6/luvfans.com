<!-- ::::::::::::: Additional Info Fields :::::::::: -->

              @if (auth()->user()->verified_id == 'yes')
              
              <div class="row form-group mb-0">
                <div class="col-lg-12 py-2">
                  <h6 class="text-muted">-- {{trans('admin.additional_info')}}</h6>
                </div>

                  <div class="col-md-6">
                      <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-star"></i></span>
                        </div>
                        <input class="form-control" name="hobbies" placeholder="{{trans('general.my_hobbies')}}"  value="{{auth()->user()->hobbies}}" type="text">
                      </div>
                    </div><!-- ./col-md-6 -->

                    <div class="col-md-6">
                        <div class="input-group mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-male"></i></span>
                          </div>                          
                          <input class="form-control" name="height" placeholder="{{trans('general.my_height')}}"  value="{{auth()->user()->height}}" type="text">
                        </div>
                      </div><!-- ./col-md-6 -->
                      
          <!-- naechste Zeile -->
               
                      <div class="col-md-6">
                        <div class="input-group mb-4"><div class="input-group-prepend">
                          <span class="input-group-text"><i class="fa fa-thumbs-up"></i></span>
                        </div>
                          <input class="form-control" name="mylikes" placeholder="{{trans('general.my_likes')}}"  value="{{auth()->user()->mylikes}}" type="text">
                        </div>
                      </div><!-- ./col-md-6 -->
  
                      <div class="col-md-6">
                          <div class="input-group mb-4"><div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-thumbs-down"></i></span>
                          </div>
                            <input class="form-control" name="mydislikes" placeholder="{{trans('general.my_dislikes')}}"  value="{{auth()->user()->mydislikes}}" type="text">
                          </div>
                        </div><!-- ./col-md-6 -->
                        
         <!-- naechste Zeile -->
                                                  
                        <div class="col-md-6">
                          <div class="input-group mb-4">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="fa fa-wrench"></i></span>
                            </div>
                            <input class="form-control" name="bodymeasurementsinch" placeholder="{{trans('general.body_measurements_inches')}}"  value="{{auth()->user()->bodymeasurementsinch}}" type="text">
                          </div>
                        </div><!-- ./col-md-6 -->
    
                        <div class="col-md-6">
                            <div class="input-group mb-4">
                              <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-wrench"></i></span>
                              </div>
                              <input class="form-control" name="bodymeasurementscm" placeholder="{{trans('general.body_measurements_cm')}}"  value="{{auth()->user()->bodymeasurementscm}}" type="text">
                            </div>
                          </div><!-- ./col-md-6 -->
               
      <!-- naechste Zeile -->
				  @endif
               
               </div><!-- :::::::: End Row Form Group Addtional Info ::::::::::: -->