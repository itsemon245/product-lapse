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
                        {{ $filter ?? '' }}
                    </div>
                </div>
            </div>
            <div class="job_listing" id="search-results">
                @error('columns')
                    <div class="text-rose-500">{{ $message }}</div>
                @enderror
                @error('model')
                    <div class="text-rose-500">{{ $message }}</div>
                @enderror
                @error('search')
                    <div class="text-rose-500">{{ $message }}</div>
                @enderror
                <div class="listing_tab">
                    <div class="row">
                        {{ $list }}
                    </div>
                </div>
                {{ $pagination ?? '' }}
            </div>
        </div>
    </section>
