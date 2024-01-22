@extends('layouts.feature.index', ['title' => 'Edit Task'])

@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('task.edit_task')</h2>
                    <form action="{{ route('task.update', ['task' => base64_encode($task->id)]) }}" method="POST"
                        class="login-form sign-in-form" enctype="multipart/form-data">
                        @method('PUT')

                        @csrf
                        <div class="row">
                            <div class="form-group text_box col-lg-12 col-md-12">
                                <label class=" text_c f_500">@lang('task.task_name')</label>
                                <input type="text" placeholder="@lang('task.task_name')" name="name"
                                    value="{{ $task->name }}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('task.category')</label>
                                <select class="selectpickers" name="category">
                                    @if ($category)
                                        @forelse ($category as $category)
                                            <option value="<?= $category->value->{app()->getLocale()} ?>">
                                                <?= $category->value->{app()->getLocale()} ?>
                                            </option>
                                        @empty
                                            <option disabled>No category available</option>
                                        @endforelse
                                    @endif
                                </select>
                                @error('category')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('task.status')</label>

                                <select class="selectpickers" name="status">

                                    @if ($status)
                                        @forelse ($status as $category)
                                            <option value="<?= $category->value->{app()->getLocale()} ?>">
                                                <?= $category->value->{app()->getLocale()} ?>
                                            </option>
                                        @empty
                                            <option disabled>No status available</option>
                                        @endforelse
                                    @endif

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
                                                <input type="checkbox" name="choose_mvp"
                                                    @if ($task->choose_mvp) checked @endif>
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
                                <textarea name="details" id="message" cols="30" rows="10" placeholder="@lang('task.task_details')">{{ $task->details }}</textarea>
                                @error('details')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-12 col-md-12">
                                <label class=" text_c f_500">@lang('task.task_steps')</label>
                                <textarea name="steps" id="message" cols="30" rows="10" placeholder="@lang('task.task_steps')">{{ $task->steps }}</textarea>
                                @error('steps')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('task.starting_date')</label>
                                <input type="date" placeholder="date" name="starting_date"
                                    value="{{ $task->starting_date ? \Carbon\Carbon::parse($task->starting_date)->toDateString() : '' }}">
                                @error('starting_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('task.ending_date')</label>
                                <input type="date" placeholder="date" name="ending_date"
                                    value="{{ $task->ending_date ? \Carbon\Carbon::parse($task->ending_date)->toDateString() : '' }}">

                                @error('ending_date')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <label class=" text_c f_500">@lang('task.administrator')</label>
                                <input type="text" placeholder="@lang('task.administrator')" name="administrator"
                                    value="{{ $task->administrator }}">
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
                                class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@lang('task.edit_task')</button>
                            <a href="{{ route('task.index') }}"
                                class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@lang('task.cancel')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
