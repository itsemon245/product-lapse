@props(['options' => []])
     <div class="modal fade" id="myModal1">
        <div class="modal-dialog">
          <div class="modal-content">
      
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Change state</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
      
            <!-- Modal body -->
            <div class="modal-body">
                <div class="container-fluid">
                    <form>
                      <div class="row">
                        @forelse ($options as $option)
                        <div class="col-12">
                            <div class="extra extra2 extra3">
                                <div class="media post_author state-select">
                                    <div class="checkbox remember">
                                        <label>
                                            <input value="{{ $option->value->{app()->getLocale()} }}" type="radio" name="optradio">
                                        </label>
                                    </div> 
                                    
                                    <div class="media-body">
                                        <h5 class=" t_color3 f_size_16 f_500">{{ $option->value->{app()->getLocale()} }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <div class="extra extra2 extra3">
                                <div class="media post_author state-select">                                   
                                    <div class="media-body">
                                        <h5 class=" t_color3 f_size_16 f_500">No action here</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                      </div>
                    </form>
                </div>
            </div>
      
              <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Save</button>
              <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg-grey" data-dismiss="modal">Cancel</button>
            </div>
      
          </div>
        </div>
      </div>