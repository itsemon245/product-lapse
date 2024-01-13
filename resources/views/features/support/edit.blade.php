@extends('layouts.feature.index', ['title' => 'Edit Support'])
@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('support.update_support_ticket')</h2>
                    <form action="{{ route('support.update', ['support' => base64_encode($support->id)]) }}" method="POST"
                        enctype="multipart/form-data" class="login-form sign-in-form">
                        <div class="row"> @csrf @method('PUT')
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('support.name')</label>
                                <input type="text" name="name" placeholder="@lang('support.name')"
                                    value="{{ $support->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('support.classification')</label>

                                <select class="selectpickers" name="classification">
                                    <option value="web" {{ $support->classification == 'web' ? 'selected' : '' }}>
                                        @lang('support.web')</option>
                                    <option value="ios" {{ $support->classification == 'ios' ? 'selected' : '' }}>
                                        @lang('support.ios')</option>
                                    <option value="android" {{ $support->classification == 'android' ? 'selected' : '' }}>
                                        @lang('support.android')</option>
                                </select>
                                @error('classification')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('support.priority')</label>

                                <select class="selectpickers" name="priority">
                                    <option value="low" {{ $support->priority == 'low' ? 'selected' : '' }}>
                                        @lang('support.low')</option>
                                    <option value="medium" {{ $support->priority == 'medium' ? 'selected' : '' }}>
                                        @lang('support.medium')</option>
                                    <option value="high" {{ $support->priority == 'high' ? 'selected' : '' }}>
                                        @lang('support.high')</option>
                                </select>
                                @error('priority')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('support.status')</label>
                                <select class="selectpickers" name="status">
                                    <option value="started" {{ $support->status == 'started' ? 'selected' : '' }}>
                                        @lang('support.started')</option>
                                    <option value="not_started" {{ $support->status == 'not_started' ? 'selected' : '' }}>
                                        @lang('support.not_started')</option>
                                    <option value="stopped" {{ $support->status == 'stopped' ? 'selected' : '' }}>
                                        @lang('support.stopped')</option>
                                </select>
                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                            <div class="form-group text_box col-lg-12 col-md-12">
                                <label class=" text_c f_500">@lang('support.description')</label>
                                <textarea name="description" id="description" cols="30" rows="10" placeholder="@lang('support.description')">{{ $support->description }}</textarea>
                                @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('support.administrator')</label>
                                <input type="text" name="administrator" placeholder="@lang('support.administrator')"
                                    value="{{ $support->administrator }}">
                                @error('administrator')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('support.completion_date')</label>
                                <input type="date" name="completion_date"
                                    value="{{ $support->completion_date ? \Carbon\Carbon::parse($support->completion_date)->format('Y-m-d') : '' }}">
                                @error('completion_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class="d-flex align-items-center text-center">
                            <button type="submit"
                                class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@lang('support.update')</button>
                            <a href="{{ route('support.index') }}"
                                class="btn_hover agency_banner_btn btn-bg btn-bg-grey">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
