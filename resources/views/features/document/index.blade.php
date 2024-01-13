@extends('layouts.feature.index', ['title' => 'Document List'])
@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="row align-items-center mb_20">

                <div class="col-lg-6 col-md-7 products-order1">
                    <div class="shop_menu_right d-flex align-items-center">
                        <div class="blog-sidebar main-search the-search">
                            <div class="widget sidebar_widget widget_search">
                                <form action="#" class="search-form input-group">
                                    <input type="search" class="form-control widget_input" placeholder="Search Document">
                                    <button type="submit"><i class="ti-search"></i></button>
                                </form>
                            </div>
                        </div>

                        <a href="{{ route('document.create') }}" class="btn_hover agency_banner_btn btn-bg"><i
                                class="ti-plus"></i>Add
                            document</a>

                    </div>
                </div>
                <div class="col-lg-6 col-md-5 products-order2">
                    <div class="shop_menu_left d-flex align-items-center justify-content-end tasks-filter">

                        <h5>Document Type</h5>
                        <form method="get" action="#">
                            <select class="selectpickers selectpickers2">
                                <option value="">All</option>
                                <option value="">Type</option>
                                <option value="">Type</option>
                                <option value="">Type</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="job_listing">
                <div class="listing_tab">
                    <div class="row">
                        @foreach ($documents as $document)
                            <div class="col-md-6">
                                <div class="item lon new">
                                    <div class="list_item">
                                        <div class="joblisting_text document-list">
                                            <div class="job_list_table">
                                                <div class="jobsearch-table-cell">
                                                    <h4><a href="{{ route('document.show', ['document' => base64_encode($document->id)]) }}"
                                                            class="f_500 t_color3">{{ $document->name }}</a>
                                                    </h4>
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            {{ \Carbon\Carbon::parse($document->date)->format('l, j F Y') }}
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="jobsearch-table-cell">
                                                    <div class="jobsearch-job-userlist">
                                                        <div class="like-btn">
                                                            <a href="javascript:void(0);" class="shortlist" title="Details">
                                                                <i class="ti-more"></i> </a>
                                                        </div>
                                                        <div class="like-btn">
                                                            <form
                                                                action="{{ route('document.download', ['id' => base64_encode($document->id)]) }}"
                                                                method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <button type="submit" class="shortlist">
                                                                    <i class="ti-download"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="like-btn">
                                                            <a class="shortlist" title="Edit"
                                                                href="{{ route('document.edit', ['document' => base64_encode($document->id)]) }}">
                                                                <i class="ti-pencil"></i>
                                                            </a>
                                                        </div>
                                                        <div>
                                                            <form
                                                                action="{{ route('document.destroy', ['document' => base64_encode($document->id)]) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="submit" class="like-btn" title="Delete">
                                                                    <i class="ti-trash"></i>
                                                                </button>
                                                            </form>
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
