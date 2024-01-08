@extends('layouts.feature.index', ['title' => 'Ideas'])
@section('main')
    <section class="sign_in_area bg_color sec_pad">
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
                        <a href="{{ route('idea.create') }}" class="btn_hover agency_banner_btn btn-bg"><i
                                class="ti-plus"></i>Add Idea</a>

                    </div>
                </div>

            </div>
            <div class="row align-items-center mb_20">

                <div class="col-lg-12 col-md-12 products-order1">
                    <div class="d-flex align-items-center">
                        @if (session('success'))
                            <div class="bg-green-500 text-white p-4 mb-4">
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>
                </div>

            </div>
            <div class="job_listing">
                <div class="listing_tab">
                    <div class="row">

                        @foreach ($ideas as $idea)
                            <div class="col-md-6">
                                <div class="item lon new">
                                    <div class="list_item">
                                        <div class="joblisting_text">
                                            <div class="job_list_table">
                                                <div class="jobsearch-table-cell">
                                                    <h4><a href="#" class="f_500 t_color3">{{ $idea->name }}</a>
                                                    </h4>
                                                    <ul class="list-unstyled">
                                                        <li class="p_color4">{{ $idea->owner }}</li>
                                                        <li class="p_color4">{{ $idea->priority }}</li>
                                                        <li class="p_color4">{{ $idea->created_at }}</li>
                                                    </ul>
                                                </div>
                                                <div class="jobsearch-table-cell">
                                                    <div class="jobsearch-job-userlist">
                                                        <div class="like-btn">
                                                            <form
                                                                action="{{ route('idea.destroy', ['idea' => base64_encode($idea->id)]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="shortlist" title="Delete">
                                                                    <i class="ti-trash"></i>
                                                                </button>
                                                            </form>

                                                        </div>
                                                        <div class="like-btn">
                                                            <a href="{{ route('idea.edit', ['idea' => base64_encode($idea->id)]) }}"
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
