@extends('layouts.frontend.app')
@section('main')
<section class="breadcrumb_area">
    <div class="container d-flex">
        <div class="breadcrumb_content text-center ml-auto">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
            </ul>
        </div>
       
    </div>
</section>
<section class="sign_in_area bg_color sec_pad" style="padding-top: 20px">
    <div class="container">
        <div class="row align-items-center mb_20">
            
            <div class="col-lg-12 col-md-12 products-order2">
                <div class="shop_menu_left d-flex align-items-center justify-content-end">
                    
                    <h5>Products</h5>
                    <form method="get" action="#">
                        <select class="selectpickers selectpickers2">
                            <option value="">T-shirt for men</option>
                            <option value="">T-shirt for men</option>
                            <option value="">T-shirt for men</option>
                            <option value="">T-shirt for men</option>
                        </select>
                    </form>
                </div>
            </div>
        </div>
        <div class="job_listing job_listing2 job_listing3">
            <div class="listing_tab">
                <div class="item lon new">
                            <div class="list_item">
                                
                                <div class="joblisting_text">
                                    <div class="job_list_table">
                                        <div class="jobsearch-table-cell">
                                            <h4>
                                                <a href="#" class="f_500 t_color3">T-shirt for men</a>
                                                <button type="submit" class="btn_hover agency_banner_btn btn-bg"><i class="ti-pencil"></i> Edit product</button>
                                            </h4>
                                            <ul class="list-unstyled">
                                                <li class="p_color1">Product status</li>
                                                <li>More about the product details here</li>
                                                <li><button type="submit" class="btn_hover agency_banner_btn btn-bg"><i class="ti-pencil"></i> Edit product</button></li>
                                            </ul>
                                        </div>
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-6">
                <div class="box-item">
                    <span class="box-item-num">4</span>
                    <a href="#"></a>
                    <img src="{{ asset('img/solution.png') }}">
                    <h5 class="f_600 t_color2">Innovate</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="box-item">
                    <span class="box-item-num">4</span>
                    <a href="#"></a>
                    <img src="img/plan.png">
                    <h5 class="f_600 t_color2">Product Planning</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="box-item">
                    <span class="box-item-num">4</span>
                    <a href="#"></a>
                    <img src="img/technical-support.png">
                    <h5 class="f_600 t_color2">Product Support</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="box-item">
                    <span class="box-item-num">4</span>
                    <a href="#"></a>
                    <img src="img/cycle.png">
                    <h5 class="f_600 t_color2">Change Management</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="box-item">
                    <span class="box-item-num">4</span>
                    <a href="#"></a>
                    <img src="img/checklist.png">
                    <h5 class="f_600 t_color2">Product Documentation</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="box-item">
                    <span class="box-item-num">4</span>
                    <a href="#"></a>
                    <img src="img/help.png">
                    <h5 class="f_600 t_color2">Product Team</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="box-item">
                    <span class="box-item-num">4</span>
                    <a href="#"></a>
                    <img src="img/dashboard.png">
                    <h5 class="f_600 t_color2">Product Reporting</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="box-item">
                    <span class="box-item-num">4</span>
                    <a href="#"></a>
                    <img src="img/website.png">
                    <h5 class="f_600 t_color2">Product info</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="box-item">
                    <span class="box-item-num">4</span>
                    <a href="#"></a>
                    <img src="img/bank-account.png">
                    <h5 class="f_600 t_color2">Product History</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="box-item">
                    <span class="box-item-num">4</span>
                    <a href="#"></a>
                    <img src="img/photo.png">
                    <h5 class="f_600 t_color2">Historical Images</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <div class="box-item">
                    <span class="box-item-num">4</span>
                    <a href="#"></a>
                    <img src="img/delivered.png">
                    <h5 class="f_600 t_color2">Product Delivery</h5>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection