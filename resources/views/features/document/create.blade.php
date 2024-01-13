@extends('layouts.feature.index', ['title' => 'Add Document'])
@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('document.add_document')</h2>
                    <form action="{{ route('document.store') }}" method="POST" enctype="multipart/form-data"
                        class="login-form sign-in-form">
                        <div class="row"> @csrf
                            <div class="form-group text_box col-lg-12 col-md-12">
                                <label class=" text_c f_500">@lang('document.name')</label>
                                <input type="text" name="name" placeholder="Document name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('document.type')</label>
                                <select class="selectpickers" name="type">
                                    <option value="pdf">@lang('document.pdf')</option>
                                    <option value="zip">@lang('document.zip')</option>
                                    <option value="rar">@lang('document.rar')</option>
                                </select>
                                @error('type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('document.version')</label>
                                <input type="text" name="version" placeholder="version">
                                @error('version')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-12 col-md-12">
                                <label class=" text_c f_500">@lang('document.description')</label>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="Document description"></textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('document.date')</label>
                                <input type="date" name="date">
                                @error('date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('document.attach')</label>
                                <input type="file" class="input-file" name="attach_file">
                                @error('attach_file')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                        </div>

                        <div class="d-flex align-items-center text-center">
                            <button type="submit"
                                class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@lang('document.add_document')</button>
                            <a href="{{ route('document.index') }}"
                                class="btn_hover agency_banner_btn btn-bg btn-bg-grey">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
