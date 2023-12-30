<section class="sign_in_area bg_color sec_pad">
    <div class="container">
        <div class="sign_info">
            <div class="login_info form-layout">
                <div class="d-flex justify-content-center align-items-center text-center certificate-btns">
                  <x-btn-primary type="submit" name="Delete" data-toggle="modal" data-target="#myModal2" />
                    {{-- <button type="submit" class="btn_hover agency_banner_btn btn-bg" data-toggle="modal" data-target="#myModal2">Delete</button> --}}
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- The Modal -->
    <div class="modal fade " id="myModal2">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
      
            <!-- Modal body -->
            <div class="modal-body modal-alert">
              <div class="modal-img"><img src="img/bin.png"></div>
              <div class="modal-text">Are sure of the deleting process ?</div>
            </div>
              <div class="modal-footer modal-btns">
                  <div class="payment-btns text-center">
                      <button type="submit" class="btn_hover agency_banner_btn btn-bg">Yes</button>
                      <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg3" data-dismiss="modal"> Cancel</button>
                  </div>
                </div>
          </div>
        </div>
      </div>