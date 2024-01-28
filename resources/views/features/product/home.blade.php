@extends('layouts.subscriber.app', ['title' => @__('productHome.title')])
@section('main')
    <x-breadcrumb :list="[['label' => @__('productHome.title'), 'route' => route('product.show', $product)]]" />
        <section class="sign_in_area bg_color sec_pad" style="padding-top: 20px">
            <div class="container">
                <div class="row align-items-center mb_20">
                    
                    <div class="col-lg-12 col-md-12 products-order2">
                        <div class="shop_menu_left d-flex align-items-center justify-content-end">
                            <h5>@__('productHome.title')</h5>
                            <form method="get" action="#">
                                <select class="selectpickers selectpickers2">
                                    @forelse ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                    <option disabled >@__('productHome.choose')</option>
                                    @endforelse
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
                                                        <button type="submit" class="btn_hover agency_banner_btn btn-bg"><i class="ti-pencil"></i> @__('productHome.edit')</button>
                                                    </h4>
                                                    <ul class="list-unstyled">
                                                        <li class="p_color1">Product status</li>
                                                        <li>More about the product details here</li>
                                                        <li><button type="submit" class="btn_hover agency_banner_btn btn-bg"><i class="ti-pencil"></i> @__('productHome.edit')</button></li>
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
                            <img style="margin:auto; margin-bottom:1rem;" src="{{ asset($feature['icon']) }}">
                            <h5 class="f_600 t_color2">{{ $feature['name'] }}</h5>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
@endsection
