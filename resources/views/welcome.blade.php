@extends('layouts.frontend.app')
@section('main')
    <div x-data="{ value: '' }">
        <section class="agency_banner_area bg_color">
            <img class="banner_shap banner_shap_ar" src="img/banner_bg-ar.png" alt="">
            <img class="banner_shap banner_shap_en" src="img/banner_bg-en.png" alt="">
            <div class="container custom_container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="agency_content">
                            <h2 x-on:keyup="value = $el.innerHTML;" hx-trigger="blur" hx-include=".hx-title-data"
                                hx-post="{{ route('landing.page.update') . '?key=title' }}" contenteditable="true"
                                class="f_700 t_color3 mb_40 wow fadeInLeft" data-wow-delay="0.3s">Join <span class="bold">
                                    ProductLapse </span>Now and enjoy an efficient and user-friendly experience in
                                <span>Manage
                                    your products</span>
                            </h2>
                            <input class="hx-title-data hidden" type="text" name="_token" value="{{ csrf_token() }}">
                            <input class="hx-title-data hidden" x-model="value" type="text" name="value">
                            <p x-on:keyup="value = $el.innerHTML;" hx-trigger="blur" hx-include=".hx-subTitle-data"
                                hx-post="{{ route('landing.page.update') . '?key=subTitle' }}" contenteditable="true"
                                class="f_500 l_height28 wow fadeInLeft" data-wow-delay="0.4s">Start your journey towards
                                success
                                and excellence in the ever-evolving market</p>
                            <input class="hx-subTitle-data hidden" type="text" name="_token"
                                value="{{ csrf_token() }}">
                            <input class="hx-subTitle-data hidden" x-model="value" type="text" name="value">
                            <div class="action_btn d-flex align-items-center mt_60">
                                <a href="{{ route('register') }}" class="btn_hover agency_banner_btn wow fadeInLeft btn-bg"
                                    data-wow-delay="0.5s">Sign up now for a free trial!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <img class="protype_img wow fadeInRight" data-wow-delay="0.3s" src="img/home.png" alt="">
                    </div>
                </div>
            </div>
        </section>
        <section class="agency_about_area bg_color" id="tolink-2">
            <div class="container custom_container">
                <h2 class="f_size_30 f_600 t_color3 l_height40 text-center wow fadeInUp title-position"
                    data-wow-delay="0.2s">
                    About us</h2>
                <div class="row">
                    <div class="col-md-6">
                        <img src="img/about.png" class="about-img wow fadeInRight" data-wow-delay="0.2s">
                    </div>
                    <div class="col-md-6">
                        <p x-on:keyup="value = $el.innerHTML;" hx-trigger="blur" hx-include=".hx-title-data-about"
                            hx-post="{{ route('landing.page.update.about') . '?key=title' }}" contenteditable="true"
                            class="f_size_22 f_400 t_color3 l_height40 wow fadeInLeft about-text" data-wow-delay="0.2s">
                            ProductLapse is a comprehensive product management tool and mobile app designed to empower you
                            in
                            realizing your product vision and achieving remarkable success in the competitive market.
                            <br><br>The platform offers the capability to clearly visualize your product, efficient
                            planning,
                            continuous support, change management, enhanced team collaboration, product documentation, and
                            comprehensive reporting.<br><br>You can also manage the product release process and track its
                            history and delivery with support for multiple products simultaneously.
                        </p>
                    </div>
                    <input class="hx-title-data-about hidden" type="text" name="_token" value="{{ csrf_token() }}">
                    <input class="hx-title-data-about hidden" x-model="value" type="text" name="value">
                </div>
            </div>
        </section>
        <section class="agency_service_area" id="tolink-3" style="background-color: white;">
            <div class="container custom_container">
                <h2 class="f_size_30 f_600 t_color3 l_height40 text-center mb_90 wow fadeInUp" data-wow-delay="0.2s">
                    Features
                </h2>
                <div class="row mb_30">
                    @foreach ($features as $feature)
                        <div class="col-lg-3 col-6">
                            <div class="p_service_item agency_service_item wow fadeInUp" data-wow-delay="0.3s">
                                <div class="icon">
                                    <img src="{{ asset($feature->image) }}" alt="">

                                </div>
                                <h5 class="f_600 t_color3">{{ $feature->title->{app()->getLocale()} }}</h5>
                                <p>{{ $feature->caption->{app()->getLocale()} }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <section class="pricing_area sec_pad" id="tolink-4">
            <div class="container custom_container p0">
                <div class="sec_title text-center">
                    <h2 class="f_size_30 l_height50 f_700 t_color2 wow fadeInUp" data-wow-delay="0.2s">Packages</h2>
                    <p class="f_400 f_size_16 l_height30 mb-0 wow fadeInUp" data-wow-delay="0.2s">Different packages to
                        suit
                        all needs .. Get Started Today !</p>
                </div>
                <div class="price_content">
                    <div class="row wow fadeInUp" data-wow-delay="0.3s">
                        <div class="col-lg-3 col-6">
                            <div class="price_item">

                                <h5 class="f_size_20 f_600 t_color2 mt_30">Free package</h5>
                                <div class="price f_700 f_size_40 t_color2">0<sub class="f_size_16 f_400"> SR</sub></div>
                                <ul class="list-unstyled p_list">
                                    <li><i class="ti-check"></i>1 Product</li>
                                    <li><i class="ti-check"></i>Limited features</li>
                                </ul>
                                <a href="#" class="price_btn btn_hover">Subscribe</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="price_item">
                                <div class="tag"><span>popular</span></div>

                                <h5 class="f_size_20 f_600 t_color2 mt_30">Basic Package</h5>
                                <div class="price f_700 f_size_40 t_color2">199<sub class="f_size_16 f_400"> SR</sub>
                                </div>
                                <ul class="list-unstyled p_list">
                                    <li><i class="ti-check"></i>3 Products</li>
                                    <li><i class="ti-check"></i>one year</li>
                                    <li><i class="ti-check"></i>All features</li>
                                </ul>
                                <a href="#" class="price_btn btn_hover">Subscribe</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="price_item">

                                <h5 class="f_size_20 f_600 t_color2 mt_30">Golden Package</h5>
                                <div class="price f_700 f_size_40 t_color2">299<sub class="f_size_16 f_400"> SR </sub>
                                </div>
                                <ul class="list-unstyled p_list">
                                    <li><i class="ti-check"></i>10 Products</li>
                                    <li><i class="ti-check"></i>one year</li>
                                    <li><i class="ti-check"></i>All features</li>
                                </ul>
                                <a href="#" class="price_btn btn_hover">Subscribe</a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="price_item">

                                <h5 class="f_size_20 f_600 t_color2 mt_30">Diamond Package</h5>
                                <div class="price f_700 f_size_40 t_color2">499<sub class="f_size_16 f_400"> SR </sub>
                                </div>
                                <ul class="list-unstyled p_list">
                                    <li><i class="ti-check"></i>30 Products</li>
                                    <li><i class="ti-check"></i>one year</li>
                                    <li><i class="ti-check"></i>All features</li>
                                </ul>
                                <a href="#" class="price_btn btn_hover">Subscribe</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="faq_area" id="tolink-5">
            <div class="container custom_container p0">
                <div class="sec_title text-center wow fadeInUp" data-wow-delay="0.2s">
                    <h2 class="f_size_30 l_height50 f_700 t_color2">Faq</h2>
                </div>
                <div class="tab-content faq_content wow fadeInUp" data-wow-delay="0.3s" id="myTabContent">
                    <div class="tab-pane fade show active" id="care">
                        <div id="accordion6">
                            <div class="row">
                                @foreach ($faqs as $faq)
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $faq->id }}">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                                        data-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                                        aria-controls="collapse{{ $faq->id }}">
                                                        {{ $faq->question->{app()->getLocale()} }}<i
                                                            class="ti-plus"></i><i class="ti-minus"></i>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse{{ $faq->id }}" class="collapse"
                                                aria-labelledby="heading{{ $faq->id }}" data-parent="#accordion6">
                                                <div class="card-body">
                                                    {{ $faq->answer->{app()->getLocale()} }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="action_area_three sec_pad">
            <div class="curved"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="action_content text-center">
                            <h2 class="f_600 f_size_30 l_height45 mb_40 wow fadeInUp" data-wow-delay="0.2s">Join now and
                                enjoy
                                an efficient and user-friendly experience<br> in managing your products !</h2>
                            <a href="{{ route('login') }}" class="about_btn white_btn wow fadeInRight btn_get"
                                data-wow-delay="0.3s">Login</a>
                            <a href="{{ route('register') }}" class="about_btn wow fadeInLeft btn_get"
                                data-wow-delay="0.4s">Sign up</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- start contact -->
        <section class="app_featured_area bg-grey contact-section" id="tolink-6">
            <div class="container">
                <div class="row flex-row-reverse app_feature_info">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <h2 class=" f_size_30 f_700 t_color3 l_height45 mb-30 wow fadeInUp" data-wow-delay="0.2s">Contact
                            us
                        </h2>
                    </div>
                    <div class="col-xl-4 col-lg-4 pr-0">
                        <div class="contact_info_item wow fadeInLeft" data-wow-delay="0.2s">
                            <h6 class=" f_size_20 t_color3 f_500 mb_20">Contact details</h6>
                            <p class=""><span class="f_400 t_color3">Phone:</span> <a href="#"
                                    class="phone-num">00000000000</a></p>
                            <p class=""><span class="f_400 t_color3">Fax:</span> <a href="#"
                                    class="phone-num">00000000000</a></p>
                            <p class=""><span class="f_400 t_color3">Email:</span> <a
                                    href="#">abcd_example@gmail.com</a></p>
                            <div class="f_social_icon">
                                <a href="#" class="ti-facebook"></a>
                                <a href="#" class="ti-twitter-alt"></a>
                                <a href="#" class="ti-vimeo-alt"></a>
                                <a href="#" class="ti-pinterest"></a>
                            </div>
                        </div>

                    </div>
                    <div class="col-xl-7 offset-xl-1 col-lg-8 offset-lg-0">
                        <div class="contact_form wow fadeInRight" data-wow-delay="0.2s">
                            <form class="contact_form_box">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group text_box">
                                            <input type="text" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group text_box">
                                            <input type="text" placeholder="Phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group text_box">
                                            <input type="text" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group text_box">
                                            <textarea placeholder="Message . . ."></textarea>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit"
                                    class="app_btn btn_hover cus_mb-10 btn_hover agency_banner_btn btn-bg">Send
                                    message</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
@endsection
@pushOnce('customJs')
    <script>
        $('a.nav-link').on('click', function(e) {
            var target = this.hash,
                $target = $(target);

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top - 70
            }, 80, 'swing', function() {
                window.location.hash = target;
            });
        });
        /****/
        $(window).scroll(function() {
            var scrollToTop = $(".top-link");
            if ($(window).scrollTop() >= 200) {
                scrollToTop.fadeIn(200);
            } else {
                scrollToTop.fadeOut(200);
            }
        });
    </script>
    <script></script>
@endPushOnce
