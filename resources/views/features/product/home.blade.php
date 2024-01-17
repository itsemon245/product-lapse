@extends('layouts.feature.index', ['title' => 'Product'])
@section('main')
    <x-breadcrumb :list="[['label' => 'Product', 'route' => route('product.show', $product)]]" />
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
                    @foreach ($features as $feature)
       
                    <div class="col-lg-3 col-md-4 col-6">
                        <div class="box-item">
                            <span class="box-item-num">{{ $feature['counter'] }}</span>
                            <a href="{{ $feature['route'] }}"></a>
                            <img src="{{ asset($feature['icon']) }}">
                            <h5 class="f_600 t_color2">{{ $feature['name'] }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection
