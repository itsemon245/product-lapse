@extends('layouts.app')
@section('main')
<section class="agency_banner_area bg_color">
    <img class="banner_shap banner_shap_ar" src="img/banner_bg-ar.png" alt="">
    <img class="banner_shap banner_shap_en" src="img/banner_bg-en.png" alt="">
    <div class="container custom_container">
          <div class="row">
            <div class="col-md-6 d-flex align-items-center">
                <div class="agency_content">
                    <h2 class="f_700 t_color3 mb_40 wow fadeInLeft" data-wow-delay="0.3s">Join <span class="bold"> ProductLapse </span>Now and enjoy an efficient and user-friendly experience in <span>Manage your products</span></h2>
                    <p class="f_500 l_height28 wow fadeInLeft" data-wow-delay="0.4s">Start your journey towards success and excellence in the ever-evolving market</p>
                    <div class="action_btn d-flex align-items-center mt_60">
                        <a href="#" class="btn_hover agency_banner_btn wow fadeInLeft btn-bg" data-wow-delay="0.5s">Sign up now for a free trial!</a>
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
        <x-delete-tost />
        <h2 class="f_size_30 f_600 t_color3 l_height40 text-center wow fadeInUp title-position" data-wow-delay="0.2s">About us</h2>
        <div class="row">
            <div class="col-md-6">
                <img src="img/about.png" class="about-img wow fadeInRight" data-wow-delay="0.2s">
            </div>
            <div class="col-md-6">
                    <p class="f_size_22 f_400 t_color3 l_height40 wow fadeInLeft about-text" data-wow-delay="0.2s">
                ProductLapse is a comprehensive product management tool and mobile app designed to empower you in realizing your product vision and achieving remarkable success in the competitive market. <br><br>The platform offers the capability to clearly visualize your product, efficient planning, continuous support, change management, enhanced team collaboration, product documentation, and comprehensive reporting.<br><br>You can also manage the product release process and track its history and delivery with support for multiple products simultaneously. 
                    </p>
            </div>
        </div>
    </div>
</section>
<section class="agency_service_area" id="tolink-3">
    <div class="container custom_container">
        <h2 class="f_size_30 f_600 t_color3 l_height40 text-center mb_90 wow fadeInUp" data-wow-delay="0.2s">Features</h2>
        <div class="row mb_30">
            <div class="col-lg-3 col-6">
                <div class="p_service_item agency_service_item wow fadeInUp" data-wow-delay="0.3s">
                    <div class="icon">
                        <img src="img/solution.png" alt="">
                        
                    </div>
                    <h5 class="f_600 t_color3">Product Vision and Ideas</h5>
                    <p>Make your product vision and ideas clear, organized, and ready for execution with an advanced product vision tool</p>
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="p_service_item agency_service_item wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon">
                        <img src="img/plan.png" alt="">
                        
                    </div>
                    <h5 class="f_600 t_color3">Product Planning</h5>
                    <p>Efficiently plan your product and create an integrated action plan to ensure maximum efficiency in achieving your goals</p>
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="p_service_item agency_service_item wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon">
                        <img src="img/technical-support.png" alt="">
                        
                    </div>
                    <h5 class="f_600 t_color3">Product Support</h5>
                    <p>We are here to support you throughout your product management journey by providing continuous support and timely issue resolution</p>
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="p_service_item agency_service_item wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon">
                        <img src="img/cycle.png" alt="">
                        
                    </div>
                    <h5 class="f_600 t_color3">Change Management</h5>
                    <p>Enable precise and effective changes to your products without any hassle with our change management tool</p>
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="p_service_item agency_service_item wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon">
                        <img src="img/help.png" alt="">
                        
                    </div>
                    <h5 class="f_600 t_color3">Team Collaboration</h5>
                    <p>Foster team collaboration and enhance communication to ensure seamless execution of projects and ideas</p>
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="p_service_item agency_service_item wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon">
                        <img src="img/checklist.png" alt="">
                        
                    </div>
                    <h5 class="f_600 t_color3">Product Documentation</h5>
                    <p>Manage all your product documentation easily and efficiently in one centralized location</p>
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="p_service_item agency_service_item wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon">
                        <img src="img/dashboard.png" alt="">
                        
                    </div>
                    <h5 class="f_600 t_color3">Product Reporting</h5>
                    <p>Gain comprehensive insights into the performance of your products through detailed and customized reports</p>
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="p_service_item agency_service_item wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon">
                        <img src="img/release.png" alt="">
                        
                    </div>
                    <h5 class="f_600 t_color3">Product Release Management</h5>
                    <p>Organize the product release process efficiently to ensure smooth and effective deliveryل</p>
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="p_service_item agency_service_item wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon">
                        <img src="img/bank-account.png" alt="">
                        
                    </div>
                    <h5 class="f_600 t_color3">Product History</h5>
                    <p>Track the history of your product and changes with precision and transparency</p>
                    
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="p_service_item agency_service_item pl_50 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="icon">
                        <img src="img/delivered.png" alt="">
                        
                    </div>
                    <h5 class="f_600 t_color3">Product Delivery with Multi-Product Support</h5>
                    <p>Manage the product delivery process efficiently and effectively with the ability to support multiple products simultaneously</p>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section class="pricing_area sec_pad" id="tolink-4">
    <div class="container custom_container p0">
        <div class="sec_title text-center">
            <h2 class="f_size_30 l_height50 f_700 t_color2 wow fadeInUp" data-wow-delay="0.2s">Packages</h2>
            <p class="f_400 f_size_16 l_height30 mb-0 wow fadeInUp" data-wow-delay="0.2s">Different packages to suit all needs .. Get Started Today !</p>
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
                            <div class="price f_700 f_size_40 t_color2">199<sub class="f_size_16 f_400"> SR</sub></div>
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
                            <div class="price f_700 f_size_40 t_color2">299<sub class="f_size_16 f_400"> SR </sub></div>
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
                            <div class="price f_700 f_size_40 t_color2">499<sub class="f_size_16 f_400"> SR </sub></div>
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
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header" id="heading24">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse24" aria-expanded="false" aria-controls="collapse24">
                                                What services can I get from the Product Labs application?<i class="ti-plus"></i><i class="ti-minus"></i>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse24" class="collapse" aria-labelledby="heading24" data-parent="#accordion6">
                                        <div class="card-body">
                                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout
                                        </div>
                                    </div>
                                </div>
                            <div class="card">
                                <div class="card-header" id="heading25">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse25" aria-expanded="false" aria-controls="collapse25">
                                            Can i add more than one product at the same time ?<i class="ti-plus"></i><i class="ti-minus"></i>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse25" class="collapse" aria-labelledby="heading25" data-parent="#accordion6">
                                    <div class="card-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading26">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse26" aria-expanded="false" aria-controls="collapse26">
                                            What services can I get from the Product Labs application?<i class="ti-plus"></i><i class="ti-minus"></i>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse26" class="collapse" aria-labelledby="heading26" data-parent="#accordion6">
                                    <div class="card-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading27">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse27" aria-expanded="false" aria-controls="collapse27">
                                            Can i add more than one product at the same time ?<i class="ti-plus"></i><i class="ti-minus"></i>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse27" class="collapse" aria-labelledby="heading27" data-parent="#accordion6">
                                    <div class="card-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header" id="heading28">
                                        <h5 class="mb-0">
                                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse28" aria-expanded="false" aria-controls="collapse28">
                                                What services can I get from the Product Labs application?<i class="ti-plus"></i><i class="ti-minus"></i>
                                            </button>
                                        </h5>
                                    </div>

                                    <div id="collapse28" class="collapse" aria-labelledby="heading28" data-parent="#accordion6">
                                        <div class="card-body">
                                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout
                                        </div>
                                    </div>
                                </div>
                            <div class="card">
                                <div class="card-header" id="heading29">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse29" aria-expanded="false" aria-controls="collapse29">
                                            Can i add more than one product at the same time ?<i class="ti-plus"></i><i class="ti-minus"></i>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse29" class="collapse" aria-labelledby="heading29" data-parent="#accordion6">
                                    <div class="card-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading30">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse30" aria-expanded="false" aria-controls="collapse30">
                                            What services can I get from the Product Labs application?<i class="ti-plus"></i><i class="ti-minus"></i>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse30" class="collapse" aria-labelledby="heading30" data-parent="#accordion6">
                                    <div class="card-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="heading31">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse31" aria-expanded="false" aria-controls="collapse31">
                                            Can i add more than one product at the same time ?<i class="ti-plus"></i><i class="ti-minus"></i>
                                        </button>
                                    </h5>
                                </div>
                                <div id="collapse31" class="collapse" aria-labelledby="heading31" data-parent="#accordion6">
                                    <div class="card-body">
                                        It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout
                                    </div>
                                </div>
                            </div>
                            
                            </div>
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
                    <h2 class="f_600 f_size_30 l_height45 mb_40 wow fadeInUp" data-wow-delay="0.2s">Join now and enjoy an efficient and user-friendly experience<br> in managing your products !</h2>
                    <a href="#" class="about_btn white_btn wow fadeInRight btn_get" data-wow-delay="0.3s">Login</a>
                    <a href="#" class="about_btn wow fadeInLeft btn_get" data-wow-delay="0.4s">Sign up</a>
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
                <h2 class=" f_size_30 f_700 t_color3 l_height45 mb-30 wow fadeInUp" data-wow-delay="0.2s">Contact us</h2>
            </div>
            <div class="col-xl-4 col-lg-4 pr-0">
                <div class="contact_info_item wow fadeInLeft" data-wow-delay="0.2s">
                    <h6 class=" f_size_20 t_color3 f_500 mb_20">Contact details</h6>
                    <p class=""><span class="f_400 t_color3">Phone:</span> <a href="#" class="phone-num">00000000000</a></p>
                    <p class=""><span class="f_400 t_color3">Fax:</span> <a href="#" class="phone-num">00000000000</a></p>
                    <p class=""><span class="f_400 t_color3">Email:</span> <a href="#">abcd_example@gmail.com</a></p>
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
                        <button type="submit" class="app_btn btn_hover cus_mb-10 btn_hover agency_banner_btn btn-bg">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@pushOnce('customJs')
<script>
    $('a.nav-link').on('click',function (e) {
      var target = this.hash,
          $target = $(target);

      $('html, body').stop().animate({
        'scrollTop': $target.offset().top-70
      }, 80, 'swing', function () {
        window.location.hash = target;
      });
    });
    /****/
    $(window).scroll(function(){
        var scrollToTop = $(".top-link");
        if ( $(window).scrollTop() >= 200 ){
            scrollToTop.fadeIn(200);
        } else {
            scrollToTop.fadeOut(200);
        }
    });
    </script>
@endPushOnce