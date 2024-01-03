@extends('layouts.app')

@section('main')
    <section class="breadcrumb_area">
        <div class="container">
            <div class="breadcrumb_content text-center">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Sign up</li>
                </ul>
            </div>
        </div>
    </section>
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">Sign up</h2>
                    <form method="POST" action="{{ route('register') }}" class="login-form sign-in-form"
                        enctype="multipart/form-data"> @csrf
                        <div class="row">
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">First name</label>
                                <input type="text" placeholder="first name" name="first_name">
                                @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">Last name</label>
                                <input type="text" placeholder="last name" name="last_name">
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">Email</label>
                                <input type="text" placeholder="Enter Email" name="email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">Password</label>
                                <input type="password" placeholder="" name="password">
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">Phone</label>
                                <input type="text" placeholder="phone">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">Work place</label>
                                <input type="text" placeholder="work place" name="workplace">
                                @error('workplace')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">Position</label>
                                <input type="text" placeholder="Position" name="position">
                                @error('position')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-md-6">
                                <label class=" text_c f_500">Promotional code</label>
                                <input type="text" placeholder="Promotional code" name="promotional_code">
                                @error('promotional_code')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="extra extra2 mb_20">
                            <div class="checkbox remember">
                                <label>
                                    <input type="checkbox"> Agree on<a href="#" data-toggle="modal"
                                        data-target="#myModal1">
                                        Terms &amp; conditions</a>
                                </label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-center">
                            <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Sign
                                up</button>
                            <button class="btn_hover agency_banner_btn btn-bg btn-bg-grey">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
