@extends('layouts.feature.index', ['title' => 'Create Idea'])

@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('idea.add_idea')</h2>
                    <form action="{{ route('idea.store') }}" method="POST" class="login-form sign-in-form"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group text_box col-lg-12">
                                <label class=" text_c f_500">@lang('idea.idea_name')</label>
                                <input type="text" placeholder="@lang('idea.name_placeholder')" name="name" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-12">
                                <label class=" text_c f_500">@lang('idea.idea_owner')</label>
                                <input type="text" placeholder="@lang('idea.owner_placeholder')" name="owner" required>
                                @error('owner')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-12">
                                <label class=" text_c f_500">@lang('idea.priority')</label>
                                <select class="selectpickers" name="priority" required>
                                    <option value="@idea.new">@lang('idea.new')</option>
                                    <option value="@idea.evaluate">@lang('idea.evaluate')</option>
                                    <option value="@idea.discuss">@lang('idea.discuss')</option>
                                    <option value="@idea.final_wording">@lang('idea.final_wording')</option>
                                    <option value="@idea.accepted">@lang('idea.accepted')</option>
                                    <option value="@idea.refused">@lang('idea.refused')</option>
                                    <option value="@idea.deleted">@lang('idea.deleted')</option>
                                </select>
                                @error('priority')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-12">
                                <label class=" text_c f_500">@lang('idea.idea_details')</label>
                                <textarea name="details" cols="30" rows="10" placeholder="@lang('idea.details_placeholder')" required></textarea>
                                @error('details')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group text_box col-lg-12">
                                <label class=" text_c f_500">@lang('idea.idea_requirements')</label>
                                <textarea name="requirements" cols="30" rows="10" placeholder="@lang('idea.requirements_placeholder')" required></textarea>
                                @error('requirements')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>

                        <div class="d-flex justify-content-between align-items-center text-center">
                            <button type="submit" class="btn_hover agency_banner_btn btn-bg">@lang('idea.add_idea')</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
