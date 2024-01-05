@extends('layouts.feature.index', ['title' => 'Product Category'])
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

                        {{-- <button type="submit" class="btn_hover agency_banner_btn btn-bg"><i class="ti-plus"></i>Add
                            Category</button> --}}

                        <x-btn-primary type="button" name="Add Categoy" data-toggle="modal" data-target="#myModal2" />

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
                                                        <a href="javascript:void(0);" class="shortlist" title="Delete"> <i
                                                                class="ti-trash"></i> </a>
                                                    </div>
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Edit"> <i
                                                                class="ti-pencil"></i> </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item lon new">
                                <div class="list_item">
                                    <figure><a href="#"><img src="img/p2.jpg" alt=""></a></figure>
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4><a href="#" class="f_500 t_color3">T-shirt for men</a></h4>
                                                <ul class="list-unstyled">
                                                    <li class="p_color2">Initial idea</li>
                                                    <li>More text about product</li>
                                                </ul>
                                            </div>
                                            <div class="jobsearch-table-cell">
                                                <div class="jobsearch-job-userlist">
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Delete"> <i
                                                                class="ti-trash"></i> </a>
                                                    </div>
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Edit"> <i
                                                                class="ti-pencil"></i> </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item lon new">
                                <div class="list_item">
                                    <figure><a href="#"><img src="img/p3.jpg" alt=""></a></figure>
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4><a href="#" class="f_500 t_color3">T-shirt for men</a></h4>
                                                <ul class="list-unstyled">
                                                    <li class="p_color3">stopped</li>
                                                    <li>More text about product</li>
                                                </ul>
                                            </div>
                                            <div class="jobsearch-table-cell">
                                                <div class="jobsearch-job-userlist">
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Delete">
                                                            <i class="ti-trash"></i> </a>
                                                    </div>
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Edit">
                                                            <i class="ti-pencil"></i> </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item lon new">
                                <div class="list_item">
                                    <figure><a href="#"><img src="img/p4.jpg" alt=""></a></figure>
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4><a href="#" class="f_500 t_color3">T-shirt for men</a></h4>
                                                <ul class="list-unstyled">
                                                    <li class="p_color4">Durable product</li>
                                                    <li>More text about product</li>
                                                </ul>
                                            </div>
                                            <div class="jobsearch-table-cell">
                                                <div class="jobsearch-job-userlist">
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Delete">
                                                            <i class="ti-trash"></i> </a>
                                                    </div>
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Edit">
                                                            <i class="ti-pencil"></i> </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                        <a href="javascript:void(0);" class="shortlist" title="Delete">
                                                            <i class="ti-trash"></i> </a>
                                                    </div>
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Edit">
                                                            <i class="ti-pencil"></i> </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item lon new">
                                <div class="list_item">
                                    <figure><a href="#"><img src="img/p2.jpg" alt=""></a></figure>
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4><a href="#" class="f_500 t_color3">T-shirt for men</a></h4>
                                                <ul class="list-unstyled">
                                                    <li class="p_color2">Initial idea</li>
                                                    <li>More text about product</li>
                                                </ul>
                                            </div>
                                            <div class="jobsearch-table-cell">
                                                <div class="jobsearch-job-userlist">
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Delete">
                                                            <i class="ti-trash"></i> </a>
                                                    </div>
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Edit">
                                                            <i class="ti-pencil"></i> </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item lon new">
                                <div class="list_item">
                                    <figure><a href="#"><img src="img/p3.jpg" alt=""></a></figure>
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4><a href="#" class="f_500 t_color3">T-shirt for men</a></h4>
                                                <ul class="list-unstyled">
                                                    <li class="p_color3">stopped</li>
                                                    <li>More text about product</li>
                                                </ul>
                                            </div>
                                            <div class="jobsearch-table-cell">
                                                <div class="jobsearch-job-userlist">
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Delete">
                                                            <i class="ti-trash"></i> </a>
                                                    </div>
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Edit">
                                                            <i class="ti-pencil"></i> </a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="item lon new">
                                <div class="list_item">
                                    <figure><a href="#"><img src="img/p4.jpg" alt=""></a></figure>
                                    <div class="joblisting_text">
                                        <div class="job_list_table">
                                            <div class="jobsearch-table-cell">
                                                <h4><a href="#" class="f_500 t_color3">T-shirt for men</a></h4>
                                                <ul class="list-unstyled">
                                                    <li class="p_color4">Durable product</li>
                                                    <li>More text about product</li>
                                                </ul>
                                            </div>
                                            <div class="jobsearch-table-cell">
                                                <div class="jobsearch-job-userlist">
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Delete">
                                                            <i class="ti-trash"></i> </a>
                                                    </div>
                                                    <div class="like-btn">
                                                        <a href="javascript:void(0);" class="shortlist" title="Edit">
                                                            <i class="ti-pencil"></i> </a>
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
                        <a class="next page-numbers" href="#"><i class="ti-arrow-right"></i></a>
                    </div>
                </nav>
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
                        <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg3" data-dismiss="modal">
                            Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
