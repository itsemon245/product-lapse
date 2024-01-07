@extends('layouts.feature.index', ['title' => 'Edit Idea'])

@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('idea.edit')</h2>
                    <form action="{{ route('idea.update', ['idea' => base64_encode($idea->id)]) }}" method="POST"
                        class="login-form sign-in-form" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group text_box col-lg-12">
                                <label class=" text_c f_500">@lang('idea.idea_name')</label>
                                <input type="text" placeholder="@lang('idea.name_placeholder')" name="name"
                                    value="{{ $idea->name }}" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-12">
                                <label class=" text_c f_500">@lang('idea.idea_owner')</label>
                                <input type="text" placeholder="@lang('idea.owner_placeholder')" name="owner"
                                    value="{{ $idea->owner }}" required>
                                @error('owner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-12">
                                <label class=" text_c f_500">@lang('idea.priority')</label>
                                <select class="selectpickers" name="priority" required>
                                    <option value="@lang('idea.new')"
                                        {{ $idea->priority == trans('idea.new') ? 'selected' : '' }}>@lang('idea.new')
                                    </option>
                                    <option value="@lang('idea.evaluate')"
                                        {{ $idea->priority == trans('idea.evaluate') ? 'selected' : '' }}>@lang('idea.evaluate')
                                    </option>
                                    <option value="@lang('idea.discuss')"
                                        {{ $idea->priority == trans('idea.discuss') ? 'selected' : '' }}>@lang('idea.discuss')
                                    </option>
                                    <option value="@lang('idea.final_wording')"
                                        {{ $idea->priority == trans('idea.final_wording') ? 'selected' : '' }}>
                                        @lang('idea.final_wording')</option>
                                    <option value="@lang('idea.accepted')"
                                        {{ $idea->priority == trans('idea.accepted') ? 'selected' : '' }}>@lang('idea.accepted')
                                    </option>
                                    <option value="@lang('idea.refused')"
                                        {{ $idea->priority == trans('idea.refused') ? 'selected' : '' }}>@lang('idea.refused')
                                    </option>
                                    <option value="@lang('idea.deleted')"
                                        {{ $idea->priority == trans('idea.deleted') ? 'selected' : '' }}>@lang('idea.deleted')
                                    </option>
                                </select>
                                @error('priority')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-12">
                                <label class=" text_c f_500">@lang('idea.idea_details')</label>
                                <textarea name="details" cols="30" rows="10" placeholder="@lang('idea.details_placeholder')" required>{{ $idea->details }}</textarea>
                                @error('details')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-12">
                                <label class=" text_c f_500">@lang('idea.idea_requirements')</label>
                                <textarea name="requirements" cols="30" rows="10" placeholder="@lang('idea.requirements_placeholder')" required>{{ $idea->name }}</textarea>
                                @error('requirements')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="d-flex justify-content-between align-items-center text-center">
                            <button type="submit" class="btn_hover agency_banner_btn btn-bg">@lang('idea.edit')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
