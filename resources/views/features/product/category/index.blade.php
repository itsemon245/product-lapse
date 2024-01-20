@extends('layouts.feature.index', ['title' => 'Product Category'])
@section('main')
    <section class="sign_in_area bg_color sec_pad" style="margin-top:100px;">
        <div class="container">
            <div class="row align-items-center mb_20">

                <div class="col-lg-12 col-md-12 products-order1">
                    <div class="shop_menu_right d-flex align-items-center">
                        <div class="blog-sidebar main-search the-search">
                            <div class="widget sidebar_widget widget_search">
                                <form action="#" class="search-form input-group">
                                    <input type="search" class="form-control widget_input" placeholder="Search product">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <a href="{{ route('product-category.create') }}" class="btn_hover agency_banner_btn btn-bg"><i
                                class="ti-plus"></i>Add Category</a>

                    </div>
                </div>

            </div>
            <div class="job_listing">
                <div class="listing_tab">
                    <div class="row">
                        @foreach ($categories as $category)
                            <div class="col-md-6">
                                <div class="item lon new">
                                    <div class="list_item">
                                        <div class="joblisting_text">
                                            <div class="job_list_table">
                                                <div class="jobsearch-table-cell">
                                                    <h4>
                                                        (En)
                                                        {{ $category->value->en }} <br>
                                                        (Ar) {{ $category->value->ar }}
                                                    </h4>
                                                    <ul class="list-unstyled">
                                                        <li class="p_color4">{{ $category->color }}</li>
                                                    </ul>
                                                </div>
                                                <div class="jobsearch-table-cell">
                                                    <div class="jobsearch-job-userlist">
                                                        <div class="like-btn">
                                                            <form
                                                                action="{{ route('product-category.destroy', ['product_category' => $category->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="shortlist" title="Delete">
                                                                    <i class="ti-trash"></i>
                                                                </button>
                                                            </form>

                                                        </div>
                                                        <div class="like-btn">
                                                            <a href="{{ route('product-category.edit', ['product_category' => $category->id]) }}"
                                                                class="shortlist" title="Edit">
                                                                <i class="ti-pencil"></i>
                                                            </a>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <nav class="navigation pagination text-center mt_60" role="navigation">
                    <div class="nav-links"><span aria-current="page" class="page-numbers current">1</span>
                        <a class="page-numbers" href="#">2</a>
                        <a class="next page-numbers" href="#"><i class="ti-arrow-right"></i></a>
                    </div>
                </nav>
            </div>
        </div>
    </section>
@endsection
