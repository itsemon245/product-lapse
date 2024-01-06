@extends('layouts.feature.index', ['title'=> 'Delivery'])
@section('main')
<section class="sign_in_area bg_color sec_pad">
  <div class="container">
      <div class="row align-items-center mb_20">
          
          <div class="col-lg-6 col-md-7 products-order1">
              <div class="shop_menu_right d-flex align-items-center">
                  <div class="blog-sidebar main-search the-search">
                      <div class="widget sidebar_widget widget_search">
                          <form action="#" class="search-form input-group">
                              <input type="searproductch" class="form-control widget_input" placeholder="Search delivery">
                              <button type="submit"><i class="ti-search"></i></button>
                          </form>
                      </div>
                  </div>
                  <x-btn-primary-href name="Add Delivery" value="<i class='ti-plus'></i>" href="{{ route('delivery.create') }}" />                
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
                @foreach ($deliveries as $delivery)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <div class="joblisting_text document-list">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="#" class="f_500 t_color3">Trial version</a></h4>
                                        <ul class="list-unstyled">
                                            
                                            <li>12 June 2023</li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <form action="{{ route('delivery.destroy', $delivery) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-btn-icons type="submit" class="btn" value="<i class='ti-trash'></i>" />
                                                </form>
                                            </div>
                                            <div class="like-btn">
                                                <x-btn-icons type="anchor" value="<i class='ti-pencil'></i>" href="{{ route('delivery.edit', $delivery) }}" />
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
                  <a class="next page-numbers" href="#"><i class="ti-arrow-right"></i></a></div>
          </nav>
      </div>
  </div>
</section>
@endsection 