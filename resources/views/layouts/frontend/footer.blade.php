<footer class="w-full !mt-auto">
    <div class="footer_area footer_area_four f_bg w-full">

        <div class="footer_bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-5 col-sm-12">
                        <p class="mb-0 f_400">@__('root.footer.copyrights') © {{ now()->year }}</p>
                    </div>
                    <div class="col-lg-6 col-md-7 col-sm-12">
                        <ul class="list-unstyled f_menu text-right">
                            @foreach ($extraPages as $page)
                            <li><a href="{{route('page.extra', $page)}}">{{$page->title->{app()->getLocale()} }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>