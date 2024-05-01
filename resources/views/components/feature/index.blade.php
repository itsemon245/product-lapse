{{ $breadcrumb ?? '' }}
<section class="sign_in_area bg_color sec_pad">
    <div class="px-3 xl:px-0 xl:container xl:mx-auto">
        <div class="lg:grid grid-cols-12 align-items-center mb_20">
            <div class="md:col-span-7 lg:col-span-8 products-order1 mb-3">
                <div class="shop_menu_right d-flex align-items-center max-lg:justify-center">
                    <div class="blog-sidebar main-search the-search">
                        <div class="widget sidebar_widget widget_search">
                            {{ $search ?? '' }}
                        </div>
                    </div>
                    <div class="inline-flex gap-2 items-center">
                        {{ $actions ?? '' }}
                        <div class="">
                            <x-workspace-switcher />
                        </div>
                    </div>
                </div>
            </div>
            <div class="md:col-span-5 lg:col-span-4 products-order2">
                <div class="shop_menu_left flex items-center justify-center lg:justify-end">
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
