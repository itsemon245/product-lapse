@extends('layouts.app')

@section('main')
    <section class="breadcrumb_area">
        <div class="container">
            <div class="breadcrumb_content text-center">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">@lang('login.home')</a></li>
                    <li class="breadcrumb-item active">@lang('login.login')</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="login_info">
                            <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('login.login')</h2>
                            <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data"
                                class="login-form sign-in-form">@csrf
                                <div class="form-group text_box">
                                    <label class=" text_c f_500">@lang('login.email')</label>
                                    <input type="text" placeholder="enter email" name="email">
                                    @error('email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group text_box">
                                    <label class=" text_c f_500">@lang('login.password')</label>
                                    <input type="password" name="password">
                                    @error('password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="extra mb_20">
                                    <div class="checkbox remember">
                                        <label>
                                            <input type="checkbox"> @lang('login.save')
                                        </label>
                                    </div>
                                    <!--//check-box-->
                                    <div class="forgotten-password">
                                        <a href="#">@lang('login.forgot_password')</a>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <button type="submit"
                                        class="btn_hover agency_banner_btn btn-bg">@lang('login.login')</button>
                                    <div class="social_text d-flex ">
                                        <div class="lead-text">@lang('login.login_within')</div>
                                        <ul class="list-unstyled social_tag mb-0">
                                            <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                            <li><a href="#"><i class="ti-google"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="sign_info_content">
                            <h3 class=" f_600 f_size_24 t_color3 mb_40">@lang('login.dont_have_account')</h3>
                            <h2 class=" f_400 f_size_30 mb-30">@lang('login.join')</h2>
                            <ul class="list-unstyled mb-0">
                                <li><i class="ti-check"></i>@lang('login.product_vision')</li>
                                <li><i class="ti-check"></i>@lang('login.product_planning')</li>
                                <li><i class="ti-check"></i>@lang('login.product_support')</li>
                                <li><i class="ti-check"></i>@lang('login.team_collaboration')</li>
                                <li><i class="ti-check"></i>@lang('login.many_features')</li>
                            </ul>
                            <button type="submit" class="btn_three sign_btn_transparent">@lang('login.sign_up')</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
