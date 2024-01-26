@extends('layouts.feature.index', ['title' => 'Send Invitation'])

@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('invitation.send_invitaion')</h2>
                    <form method="POST" action="{{ route('invitation.store') }}" class="login-form sign-in-form"
                        enctype="multipart/form-data"> @csrf
                        <div class="row">
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <label class=" text_c f_500">@lang('invitation.fisrt_name')</label>
                                <input type="text" placeholder="first name" name="first_name">
                                @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <label class=" text_c f_500">@lang('invitation.last_name')</label>
                                <input type="text" placeholder="last name" name="last_name">
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <label class=" text_c f_500">@lang('invitation.email')</label>
                                <input type="text" placeholder="Enter Email" name="email">
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text_box col-lg-4 col-md-6">
                                <label class=" text_c f_500">@lang('invitation.phone')</label>
                                <input type="text" placeholder="phone" name="phone">
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <label class=" text_c f_500">@lang('invitation.position')</label>
                                <input type="text" placeholder="Position" name="position">
                                @error('position')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <label class=" text_c f_500">@lang('invitation.role')</label>
                                <input type="text" placeholder="Role" name="role">
                                @error('workplace')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text_box col-lg-12 col-md-12">
                                <label class=" text_c f_500">@lang('invitation.choose')</label>
                                <div class="row">
                                    @foreach ($products as $product)
                                        <div class="col-lg-4 col-md-6">
                                            <div class="checkbox remember">
                                                <label>
                                                    <input type="checkbox" value="{{ $product->id }}" name="products[]">
                                                    {{ $product->name }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                    @error('    ')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>


                        <div class="d-flex align-items-center text-center">
                            <button type="submit"
                                class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@lang('invitation.send_invitaion')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
