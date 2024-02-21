@extends('layouts.frontend.app')

@section('main')
    <section class="breadcrumb_area">
        <div class="container">
            <div class="breadcrumb_content text-center">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">@__('singup.home')</a></li>
                    <li class="breadcrumb-item active">@__('Confirm Registration')</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info form-layout">
                    <div class="invitation-img">
                        <img src="img/check.png" class="mx-auto">
                    </div>
                    <h2 class="f_600 f_size_24 t_color3 mb_20 text-center">@__('You have been registered successfully')</h2>
                    <form action="{{ route('login') }}" class="login-form sign-in-form">
                        <div class="d-flex justify-content-center align-items-center text-center">
                            <button type="submit" class="btn_hover agency_banner_btn btn-bg">@__('Login')</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
