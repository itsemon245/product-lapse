@extends('layouts.frontend.app')

@section('main')
    <section class="breadcrumb_area">
        <div class="container">
            <div class="breadcrumb_content text-center">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@__('singup.home')</a></li>
                    <li class="breadcrumb-item active">@__('Payment Failed')</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info form-layout">
                    <div class="invitation-img">
                        <img src="{{asset('img/cancel.png')}}" class="mx-auto">
                    </div>
                    <h2 class="f_600 f_size_24 p_color3 mb_20 text-center">@__('Payment Failed!')</h2>
                    <form action="{{ route('home') }}" class="login-form sign-in-form">
                        <div class="d-flex justify-content-center align-items-center text-center">
                            <button type="submit" class="btn_hover agency_banner_btn btn-bg">@__('Back to home')</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
