@extends('layouts.feature.index', ['title' => 'Create Task'])

@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('task.add_task')</h2>
                    <form action="{{ route('task.store') }}" method="POST" class="login-form sign-in-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group text_box col-lg-12 col-md-12">
                                <label class=" text_c f_500">@lang('task.task_name')</label>
                                <input type="text" placeholder="@lang('task.task_name')" name="name">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('task.category')</label>
                                <select class="selectpickers" name="category">
                                    <option value="one">@lang('task.one')</option>
                                    <option value="two">@lang('task.two')</option>
                                    <option value="three">@lang('task.three')</option>
                                </select>
                                @error('category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('task.status')</label>
                                <select class="selectpickers" name="status">
                                    <option value="started">
                                        @lang('task.started')
                                    </option>
                                    <option value="not_started">
                                        @lang('task.not_started')
                                    </option>
                                    <option value="stopped">
                                        @lang('task.stopped')
                                    </option>
                                </select>

                                @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-12">
                                <div class="extra extra2 extra3">
                                    <div class="media post_author state-select">
                                        <div class="checkbox remember">
                                            <label>
                                                <input type="checkbox" name="choose_mvp">
                                            </label>
                                            @error('choose_mvp')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="media-body">
                                            <h5 class=" t_color3 f_size_16 f_500">@lang('task.choose_mvp')</h5>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="form-group text_box col-lg-12 col-md-12">
                                <label class=" text_c f_500">@lang('task.task_details')</label>
                                <textarea name="details" id="message" cols="30" rows="10" placeholder="@lang('task.task_details')"></textarea>
                                @error('details')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-12 col-md-12">
                                <label class=" text_c f_500">@lang('task.task_steps')</label>
                                <textarea name="steps" id="message" cols="30" rows="10" placeholder="@lang('task.task_steps')"></textarea>
                                @error('steps')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('task.starting_date')</label>
                                <input type="date" placeholder="date" name="starting_date">
                                @error('starting_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('task.ending_date')</label>
                                <input type="date" placeholder="date" name="ending_date">
                                @error('ending_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('task.administrator')</label>
                                <input type="text" placeholder="@lang('task.administrator')" name="administrator">
                                @error('administrator')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('task.attachments')</label>
                                <input type="file" class="input-file" name="add_attachments">
                                @error('add_attachments')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="d-flex align-items-center text-center">
                            <button type="submit"
                                class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@lang('task.add_task')</button>
                            <a href="{{ route('task.index') }}"
                                class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@lang('task.cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
