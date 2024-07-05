@extends('layouts.frontend.app')
@section('main')
    <div>
        <section class="agency_banner_area bg_color" id="tolink-1">
            <img class="banner_shap banner_shap_ar" src="img/banner_bg-ar.png" alt="">
            <img class="banner_shap banner_shap_en" src="img/banner_bg-en.png" alt="">
            <div class="container custom_container">
                <div class="row">
                    <div class="col-md-6 d-flex align-items-center">
                        <div class="agency_content">
                            <h2 class="f_700 t_color3 mb_40 wow fadeInLeft" data-wow-delay="0.3s">
                                <?= $info?->home?->title?->{app()->getLocale()} ?>
                            </h2>
                            <p class="f_500 l_height28 wow fadeInLeft" data-wow-delay="0.4s">
                                <?= $info?->home?->caption?->{app()->getLocale()} ?></p>
                            <div class="action_btn d-flex gap-3 align-items-center mt_60">
                                @auth
                                    <a href="#tolink-4" class="btn_hover agency_banner_btn wow fadeInLeft btn-bg"
                                        data-wow-delay="0.5s">@__('Browse Packages')</a>
                                @else
                                    <a href="{{ route('register') }}" class="btn_hover agency_banner_btn wow fadeInLeft btn-bg"
                                        data-wow-delay="0.5s"> <?= $info?->home?->button?->{app()->getLocale()} ?></a>
                                @endauth
                                <a href="/book-demo" class="btn_hover agency_banner_btn wow fadeInLeft btn-bg"
                                    data-wow-delay="0.5s">
                                    @__('Book a demo')
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 text-right">
                        <img class="protype_img wow fadeInRight" data-wow-delay="0.3s"
                            src="{{ asset($info?->home?->image) }}" alt="home">
                    </div>
                </div>
            </div>
        </section>
        <section class="agency_about_area bg_color" id="tolink-2">
            <div class="container custom_container">
                <h2 class="f_size_30 f_600 t_color3 l_height40 text-center wow fadeInUp title-position"
                    data-wow-delay="0.2s">@lang('welcome.about_us')</h2>
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset($info?->about_us?->image) }}" alt="about" class="about-img wow fadeInRight"
                            data-wow-delay="0.2s">
                    </div>
                    <div class="col-md-6">
                        <p class="f_size_22 f_400 t_color3 l_height40 wow fadeInLeft about-text" data-wow-delay="0.2s">
                            <?= $info?->about_us?->caption?->{app()->getLocale()} ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <section class="agency_service_area" id="tolink-3" style="background-color: white;">
            <div class="container custom_container">
                <h2 class="f_size_30 f_600 t_color3 l_height40 text-center mb_90 wow fadeInUp" data-wow-delay="0.2s">
                    @lang('welcome.features')
                </h2>
                <div class="row mb_30">
                    @foreach ($features as $feature)
                        <div class="col-lg-3 col-6">
                            <div class="p_service_item agency_service_item wow fadeInUp" data-wow-delay="0.3s">
                                <div class="icon">
                                    <img src="{{ asset($feature?->image) }}" alt="">

                                </div>
                                <h5 class="f_600 t_color3">{{ $feature?->title?->{app()->getLocale()} }}</h5>
                                <p><?= $feature?->caption?->{app()->getLocale()} ?></p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @include('layouts.frontend.pricing-area', ['info' => $info, 'packages' => $packages])

        <section class="faq_area" id="tolink-5">
            <div class="container custom_container p0">
                <div class="sec_title text-center wow fadeInUp" data-wow-delay="0.2s">
                    <h2 class="f_size_30 l_height50 f_700 t_color2">@lang('welcome.faqs')</h2>
                </div>
                <div class="tab-content faq_content wow fadeInUp" data-wow-delay="0.3s" id="myTabContent">
                    <div class="tab-pane fade show active" id="care">
                        <div id="accordion6">
                            <div class="row">
                                @foreach ($faqs as $faq)
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $faq?->id }}">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse"
                                                        data-target="#collapse{{ $faq?->id }}" aria-expanded="false"
                                                        aria-controls="collapse{{ $faq?->id }}">
                                                        <?= $faq?->question?->{app()->getLocale()} ?><i
                                                            class="ti-plus"></i><i class="ti-minus"></i>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="collapse{{ $faq?->id }}" class="collapse"
                                                aria-labelledby="heading{{ $faq?->id }}" data-parent="#accordion6">
                                                <div class="card-body">
                                                    <?= $faq?->answer?->{app()->getLocale()} ?>
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
                            <h2 class="f_600 f_size_30 l_height45 mb_40 wow fadeInUp" data-wow-delay="0.2s">
                                <?= $info?->join?->{app()->getLocale()} ?></h2>
                            <a href="{{ auth()->user() ? '/' : route('login') }}"
                                class="about_btn white_btn wow fadeInRight btn_get"
                                data-wow-delay="0.3s">@lang('welcome.login')</a>
                            <a href="{{ auth()->user() ? '/' : route('register') }}"
                                class="about_btn wow fadeInLeft btn_get" data-wow-delay="0.4s">@lang('welcome.sign_up')</a>
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
                        <h2 class=" f_size_30 f_700 t_color3 l_height45 mb-30 wow fadeInUp" data-wow-delay="0.2s">
                            @lang('welcome.contact_us')</h2>
                    </div>
                    <div class="col-xl-4 col-lg-4 pr-0">
                        <div class="contact_info_item wow fadeInLeft" data-wow-delay="0.2s">
                            <h6 class=" f_size_20 t_color3 f_500 mb_20">@lang('welcome.contact_details')</h6>
                            <p class=""><span class="f_400 t_color3">@lang('welcome.phone')</span> <a
                                    href="tel:{{ $contact?->phone }}" class="phone-num">{{ $contact?->phone }}</a></p>
                            <p class=""><span class="f_400 t_color3">@lang('welcome.fax')</span> <a
                                    href="fax:{{ $contact?->fax }}" class="phone-num">{{ $contact?->fax }}</a></p>
                            <p class=""><span class="f_400 t_color3">@lang('welcome.email'):</span> <a
                                    href="mailto:{{ $contact?->email }}">{{ $contact?->email }}</a></p>
                            <div class="f_social_icon">
                                @if ($contact?->facebook)
                                    <a href="{{ $contact?->facebook }}" class="ti-facebook"></a>
                                @endif
                                @if ($contact?->twitter)
                                    <a href="{{ $contact?->twitter }}" class="ti-twitter-alt"></a>
                                @endif
                                @if ($contact?->vimeo)
                                    <a href="{{ $contact?->vimeo }}" class="ti-vimeo-alt"></a>
                                @endif
                                @if ($contact?->pinterest)
                                    <a href="{{ $contact?->pinterest }}" class="ti-pinterest"></a>
                                @endif

                            </div>
                        </div>

                    </div>
                    <div class="col-xl-7 offset-xl-1 col-lg-8 offset-lg-0">
                        <div class="contact_form wow fadeInRight" data-wow-delay="0.2s">
                            <form action="{{ route('message.send') }}" method="POST" id="ajax-contact-form"
                                class="contact_form_box">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group text_box">
                                            <input name="name" type="text" placeholder="@lang('welcome.name')">
                                            @error('name')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group text_box">
                                            <input name="phone" required type="text"
                                                placeholder="@lang('welcome.phone')">
                                            @error('phone')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group text_box">
                                            <input name="email" type="email" required
                                                placeholder="@lang('welcome.email')">
                                            @error('email')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group text_box">
                                            <textarea name="body" required placeholder="@lang('welcome.message')"></textarea>
                                            @error('body')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <button id="submit-btn" type="submit"
                                    class="app_btn btn_hover cus_mb-10 btn_hover agency_banner_btn btn-bg">@lang('welcome.send')</button>
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
        $(document).ready(function() {
            let form = $('#ajax-contact-form')
            form.submit(function(e) {
                $('#submit-btn').html(`
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm0,19a8,8,0,1,1,8-8A8,8,0,0,1,12,20Z" opacity=".25"/><path fill="currentColor" d="M10.72,19.9a8,8,0,0,1-6.5-9.79A7.77,7.77,0,0,1,10.4,4.16a8,8,0,0,1,9.49,6.52A1.54,1.54,0,0,0,21.38,12h.13a1.37,1.37,0,0,0,1.38-1.54,11,11,0,1,0-12.7,12.39A1.54,1.54,0,0,0,12,21.34h0A1.47,1.47,0,0,0,10.72,19.9Z"><animateTransform attributeName="transform" dur="0.75s" repeatCount="indefinite" type="rotate" values="0 12 12;360 12 12"/></path></svg>
                `)
                e.preventDefault()
                $.ajax({
                    type: "post",
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function(response) {
                        if (response.success) {
                            $('#submit-btn').html(response.message).attr('disabled', true)
                            form.find('input').val('')
                            form.find('textarea').val('')
                            form.find('textarea').html('')
                            form.find('textarea').text('')
                        }
                    }
                });
            })
        });

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
