<div>
    {{ $breadcrumb }}
<section class="sign_in_area bg_color sec_pad">
    <div class="container">
        <div class="row align-items-center mb_20">
            <div class="col-lg-8 col-md-7 products-order1">
                <div class="shop_menu_right d-flex align-items-center">
                    <div class="blog-sidebar main-search the-search">
                        <div class="widget sidebar_widget widget_search">
                        {{ $search }}
                        </div>
                    </div>
                  <div class="flex gap-2 items-center">
                    {{ $actions }}
                  </div>              
                </div>
            </div>
            <div class="col-lg-4 col-md-5 products-order2">
                <div class="shop_menu_left d-flex align-items-center justify-content-end">
                    {{ $filter }}
                </div>
            </div>
        </div>
        <div class="job_listing">
            <div class="listing_tab">
                <div class="row">
                    {{ $list }}
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
</div>