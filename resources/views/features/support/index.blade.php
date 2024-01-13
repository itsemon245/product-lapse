@extends('layouts.feature.index', ['title' => 'Support List'])
@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="row align-items-center mb_20">

                <div class="col-lg-6 col-md-7 products-order1">
                    <div class="shop_menu_right d-flex align-items-center">
                        <div class="blog-sidebar main-search the-search">
                            <div class="widget sidebar_widget widget_search">
                                <form action="#" class="search-form input-group">
                                    <input type="search" class="form-control widget_input" placeholder="search for ticket">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <a class="btn_hover agency_banner_btn btn-bg" href="{{ route('support.create') }}">
                            <i class="ti-plus"></i>
                            Add ticket</a>

                    </div>
                </div>
                <div class="col-lg-6 col-md-5 products-order2">
                    <div class="shop_menu_left d-flex align-items-center justify-content-end tasks-filter">

                        <h5>Status</h5>
                        <form method="get" action="#">
                            <select class="selectpickers selectpickers2">
                                <option value="">All</option>
                                <option value="">working on</option>
                                <option value="">pending</option>
                                <option value="">stopped</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="job_listing">
                <div class="listing_tab">
                    <div class="row">
                        @foreach ($supports as $support)
                            <div class="col-md-6">
                                <div class="item lon new">
                                    <div class="list_item">
                                        <figure><a href="#"><img src="img/p6.png" alt=""></a></figure>
                                        <div class="joblisting_text">
                                            <div class="job_list_table">
                                                <div class="jobsearch-table-cell">
                                                    <h4><a href="{{ route('support.show', ['support' => base64_encode($support->id)]) }}"
                                                            class="f_500 t_color3">{{ $support->name }}</a>
                                                    </h4>
                                                    <ul class="list-unstyled">
                                                        <li class="p_color1">@lang('support.' . $support->status)</li>
                                                        <li>
                                                            {{ \Carbon\Carbon::parse($support->created_at)->format('l, j F Y') }}
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="jobsearch-table-cell">
                                                    <div class="jobsearch-job-userlist">
                                                        <div class="like-btn">
                                                            <form
                                                                action="{{ route('support.destroy', ['support' => base64_encode($support->id)]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="shortlist" title="Delete">
                                                                    <i class="ti-trash"></i>
                                                                </button>
                                                            </form>

                                                        </div>
                                                        <div class="like-btn">
                                                            <a href="{{ route('support.edit', ['support' => base64_encode($support->id)]) }}"
                                                                class="shortlist" title="Edit">
                                                                <i class="ti-pencil"></i>
                                                            </a>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="like-btn">
                                        <x-btn-icons type="anchor" value="<i class='ti-pencil'></i>" href="{{ route('support.edit', $support) }}" />
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
