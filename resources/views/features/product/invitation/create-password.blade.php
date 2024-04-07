@extends('layouts.subscriber.app', ['title' => __('Create Password')])

@section('main')
    <section class="breadcrumb_area mt-6">
        <div class="container d-flex">
            <div class="breadcrumb_content text-center ml-auto">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">@__('Create Password')</li>
                </ul>
            </div>

        </div>
    </section>
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('createPassword.create_password')</h2>
                    <form method="POST" action="{{ route('invitation.password-store', ['id' => $id]) }}"
                        class="login-form sign-in-form" enctype="multipart/form-data" autocomplete="off"> @csrf
                        <div class="row">
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <label for="" class="text_c f_500">@__('Create Password')</label>

                                <x-input id="password" class="block mt-1 w-full" type="password"
                                    placeholder="{{ __('feature/delivery.placeholder.password') }}" name="password"
                                    :value="old('password')" required autofocus />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <label for="" class="text_c f_500">@__('Confirm Password')</label>
                                <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                    placeholder="{{ __('feature/delivery.placeholder.password') }}" name="confirm_password"
                                    :value="old('password')" required autofocus />
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-center">
                            <button type="submit"
                                class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@lang('createPassword.confirm')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
