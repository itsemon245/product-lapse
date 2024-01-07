@extends('layouts.frontend.app')

@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('createPassword.create_password')</h2>
                    <form method="POST" action="{{ route('invitation.password-store', ['id' => $id]) }}"
                        class="login-form sign-in-form" enctype="multipart/form-data" autocomplete="off"> @csrf
                        <div class="row">
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <label class=" text_c f_500">@lang('createPassword.password')</label>
                                <input type="password" placeholder="Enter Password" name="password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <label class=" text_c f_500">@lang('createPassword.password_confirmation')</label>
                                <input type="password" placeholder="Confirm Password" name="password_confirmation">
                                @error('password_confirmation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
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
