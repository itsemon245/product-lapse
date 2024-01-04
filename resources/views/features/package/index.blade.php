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
                              <input type="search" class="form-control widget_input" placeholder="Search product">
                              <button type="submit"><i class="ti-search"></i></button>
                          </form>
                      </div>
                  </div>
                  
                  <button type="submit" class="btn_hover agency_banner_btn btn-bg"><i class="ti-plus"></i>Add product</button>
                  
              </div>
          </div>
          <div class="col-lg-6 col-md-5 products-order2">
              <div class="shop_menu_left d-flex align-items-center justify-content-end">
                  
                  <h5>Showing products</h5>
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
                                                  <a href="javascript:void(0);" class="shortlist" title="Delete"> <i class="ti-trash"></i> </a>
                                              </div>
                                              <div class="like-btn">
                                                  <a href="javascript:void(0);" class="shortlist" title="Edit"> <i class="ti-pencil"></i> </a>
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
                                                  <a href="javascript:void(0);" class="shortlist" title="Delete"> <i class="ti-trash"></i> </a>
                                              </div>
                                              <div class="like-btn">
                                                  <a href="javascript:void(0);" class="shortlist" title="Edit"> <i class="ti-pencil"></i> </a>
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
                                                  <a href="javascript:void(0);" class="shortlist" title="Delete"> <i class="ti-trash"></i> </a>
                                              </div>
                                              <div class="like-btn">
                                                  <a href="javascript:void(0);" class="shortlist" title="Edit"> <i class="ti-pencil"></i> </a>
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
                                                  <a href="javascript:void(0);" class="shortlist" title="Delete"> <i class="ti-trash"></i> </a>
                                              </div>
                                              <div class="like-btn">
                                                  <a href="javascript:void(0);" class="shortlist" title="Edit"> <i class="ti-pencil"></i> </a>
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
                                                  <a href="javascript:void(0);" class="shortlist" title="Delete"> <i class="ti-trash"></i> </a>
                                              </div>
                                              <div class="like-btn">
                                                  <a href="javascript:void(0);" class="shortlist" title="Edit"> <i class="ti-pencil"></i> </a>
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
                                                  <a href="javascript:void(0);" class="shortlist" title="Delete"> <i class="ti-trash"></i> </a>
                                              </div>
                                              <div class="like-btn">
                                                  <a href="javascript:void(0);" class="shortlist" title="Edit"> <i class="ti-pencil"></i> </a>
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
                                                  <a href="javascript:void(0);" class="shortlist" title="Delete"> <i class="ti-trash"></i> </a>
                                              </div>
                                              <div class="like-btn">
                                                  <a href="javascript:void(0);" class="shortlist" title="Edit"> <i class="ti-pencil"></i> </a>
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
                                                  <a href="javascript:void(0);" class="shortlist" title="Delete"> <i class="ti-trash"></i> </a>
                                              </div>
                                              <div class="like-btn">
                                                  <a href="javascript:void(0);" class="shortlist" title="Edit"> <i class="ti-pencil"></i> </a>
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
@endsection