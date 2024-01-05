@extends('layouts.feature.index', ['title'=> 'Products'])
@section('main')
<section class="sign_in_area bg_color sec_pad">
  <div class="container">
      <div class="row align-items-center mb_20">
          
          <div class="col-lg-6 col-md-7 products-order1">
              <div class="shop_menu_right d-flex align-items-center">
                  <div class="blog-sidebar main-search the-search">
                      <div class="widget sidebar_widget widget_search">
                          <form action="#" class="search-form input-group">
                              <input type="searproductch" class="form-control widget_input" placeholder="Search packages">
                              <button type="submit"><i class="ti-search"></i></button>
                          </form>
                      </div>
                  </div>
                  
                  <button type="submit" class="btn_hover agency_banner_btn btn-bg" data-toggle="modal" data-target="#addPackage" ><i class="ti-plus"></i>Add Package</button>
                  
              </div>
          </div>
          <div class="col-lg-6 col-md-5 products-order2">
              <div class="shop_menu_left d-flex align-items-center justify-content-end">
                  
                  <h5>Showing packages</h5>
                  <form method="get" action="#">
                      <select class="selectpickers selectpickers2" style="display: none;">
                          <option value="">All</option>
                          <option value="">Durable product</option>
                          <option value="">Initial idea</option>
                          <option value="">Stopped</option>
                      </select><div class="nice-select selectpickers selectpickers2" tabindex="0"><span class="current">All</span><ul class="list"><li data-value="" class="option selected focus">All</li><li data-value="" class="option">Durable product</li><li data-value="" class="option">Initial idea</li><li data-value="" class="option">Stopped</li></ul></div>
                  </form>
              </div>
          </div>
      </div>
      <div class="job_listing">
          <div class="listing_tab">
              <div class="row">
                  <div class="col-md-6">
                      <div class="item lon new">
                          <div class="list_item">
                              <figure><a href="#"><img src="img/p1.jpg" alt=""></a></figure>
                              <div class="joblisting_text">
                                  <div class="job_list_table">
                                      <div class="jobsearch-table-cell">
                                          <h4><a href="#" class="f_500 t_color3">T-shirt for men</a></h4>
                                          <ul class="list-unstyled">
                                              <li class="p_color1">Durable product</li>
                                              <li>More text about product</li>
                                          </ul>
                                      </div>
                                      <div class="jobsearch-table-cell">
                                          <div class="jobsearch-job-userlist">
                                              <div class="like-btn">
                                                  <a href="javascript:void(0);"  class="shortlist" title="Delete"> <i class="ti-trash"></i> </a>
                                              </div>
                                              <div class="like-btn">
                                                {{-- <button type="button" data-bs-toggle="modal" data-bs-target="#packageAdd"><i class="ti-pencil"></i></button> --}}
                                                  <a href="javascript:void(0);" data-toggle="modal" data-target="#"><i class="ti-pencil"></i></a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <nav class="navigation pagination text-center mt_60" role="navigation">
              <div class="nav-links"><span aria-current="page" class="page-numbers current">1</span>
                  <a class="page-numbers" href="#">2</a>
                  <a class="next page-numbers" href="#"><i class="ti-arrow-right"></i></a></div>
          </nav>
      </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="addPackage">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 80rem;">
      <div class="modal-content">
       
  
        <!-- Modal body -->
        <div class="sign_info">
            <div class="login_info">
                <h2 class=" f_600 f_size_24 t_color3 mb_40">Add package</h2>
                        <form hx-post="{{ route('package.store') }}" class="login-form sign-in-form">
                            @csrf
                            <div class="row">
                                <div class="form-group text_box col-lg-4 col-md-6">
                                    <x-input-label for="name" value="Package name" />
                                    <x-text-input id="name" class="block mt-1 w-full" type="text" placeholder="Enter package name" name="name" :value="old('name')" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                                <div class="form-group text_box col-lg-4 col-md-6">
                                    <x-input-label for="price" value="Package price" />
                                    <x-text-input id="price" class="block mt-1 w-full" type="text" placeholder="Enter package price" name="price" :value="old('price')" required autofocus />
                                    <x-input-error :messages="$errors->get('price')" class="mt-2" />
                                </div>
                                <div class="form-group text_box col-lg-4 col-md-6">
                                    <x-input-label for="monthly_rate" value="Monthly rate" />
                                    <x-text-input id="monthly_rate" class="block mt-1 w-full" type="text" placeholder="Enter monthly rate" name="monthly_rate" :value="old('monthly_rate')" required autofocus />
                                    <x-input-error :messages="$errors->get('monthly_rate')" class="mt-2" />
                                </div>
                                <div class="form-group text_box col-lg-4 col-md-6">
                                    <x-input-label for="annual_rate" value="Annual rate" />
                                    <x-text-input id="annual_rate" class="block mt-1 w-full" type="text" placeholder="Enter annual rate" name="annual_rate" :value="old('annual_rate')" required autofocus />
                                    <x-input-error :messages="$errors->get('annual_rate')" class="mt-2" />
                                </div>
                                <div class="form-group text_box col-lg-4 col-md-6">
                                    <x-select-input label="Subscription type" id="annual_rate"  placeholder="Choose one" name="subscription_type" required autofocus> 
                                        <option value="jmkk">Option</option>
                                    </x-select-input>
                                </div>
                                <div class="form-group text_box col-lg-4 col-md-6">
                                    <x-input-label for="features" value="Features" />
                                    <x-text-input id="features" class="block mt-1 w-full" type="text" placeholder="Enter features" name="features" :value="old('features')" required autofocus />
                                    <x-input-error :messages="$errors->get('features')" class="mt-2" />
                                </div>
                                <div class="form-group text_box col-lg-4 col-md-6">
                                    <x-input-label for="product_limit" value="Product limit" />
                                    <x-text-input id="product_limit" class="block mt-1 w-full" type="date" name="product_limit" :value="old('product_limit')" required autofocus />
                                    <x-input-error :messages="$errors->get('product_limit')" class="mt-2" />
                                </div>
                                <div class="form-group text_box col-lg-4 col-md-6">
                                    <x-input-label for="validity" value="Validity" />
                                    <x-text-input id="validity" class="block mt-1 w-full" type="date" name="validity" :value="old('validity')" required autofocus />
                                    <x-input-error :messages="$errors->get('validity')" class="mt-2" />
                                </div>
                                <div class="form-group text_box col-lg-4 col-md-6">
                                    <x-input-label for="has_limited_features" value="Limited features" />
                                    <x-text-input id="has_limited_features" class="block mt-1 w-full" type="text" name="has_limited_features" placeholder="Limited features" :value="old('has_limited_features')" required autofocus />
                                    <x-input-error :messages="$errors->get('has_limited_features')" class="mt-2" />
                                </div>
                                <div class="form-group text_box col-lg-4 col-md-6">
                                   
                                    <x-checkbox-input class="ml-4" checked label="Set propular tag." />
                                </div>
                                
                                
                            </div>
                            
                            <div class="d-flex align-items-center text-center">
                                <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Add package</button>
                                <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg-grey" data-dismiss="modal">Cancel</button>
                            </div>
                        </form>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection 