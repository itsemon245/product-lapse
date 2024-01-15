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

                            <div class="form-group text_box col-lg-12 col-md-12">
                                <x-input-label for="name" value="{{ __('idea.idea_name') }}" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text"
                                    placeholder="{{ __('idea.name_placeholder') }}" name="name" :value="old('name')"
                                    required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <div class="form-group text_box col-lg-12 col-md-12">
                                <x-input-label for="owner" value="{{ __('idea.idea_owner') }}" />
                                <x-text-input id="owner" class="block mt-1 w-full" type="text"
                                    placeholder="{{ __('idea.owner_placeholder') }}" name="owner" :value="old('owner')"
                                    required autofocus />
                                <x-input-error :messages="$errors->get('owner')" class="mt-2" />
                            </div>

                            <div class="form-group text_box col-lg-12">
                                <x-select-input label="{{ __('idea.priority') }}" id="priority" placeholder="Choose one"
                                    name="priority" required autofocus>
                                    <option value="new">@lang('idea.new')</option>
                                    <option value="evaluate">@lang('idea.evaluate')</option>
                                    <option value="discuss">@lang('idea.discuss')</option>
                                    <option value="final_wording">@lang('idea.final_wording')</option>
                                    <option value="accepted">@lang('idea.accepted')</option>
                                    <option value="refused">@lang('idea.refused')</option>
                                    <option value="deleted">@lang('idea.deleted')</option>
                                </x-select-input>
                                <x-input-error :messages="$errors->get('priority')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-12">
                                <x-input-label for="details" value="{{ __('idea.idea_details') }}" />
                                <x-textarea id="details" class="block mt-1 w-full" name="details" :value="old('details')"
                                    placeholder="{{ __('idea.details_placeholder') }}" required autofocus />
                                <x-input-error :messages="$errors->get('details')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-12">
                                <x-input-label for="requirements" value="{{ __('idea.idea_requirements') }}" />
                                <x-textarea id="requirements" class="block mt-1 w-full" name="requirements"
                                    :value="old('requirements')" placeholder="{{ __('idea.requirements_placeholder') }}" required
                                    autofocus />
                                <x-input-error :messages="$errors->get('requirements')" class="mt-2" />
                            </div>
                        </div>

                        <div class="d-flex align-items-center text-center">
                            <button type="submit"
                                class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@lang('idea.add_idea')</button>
                            <a href="{{ route('idea.index') }}"
                                class="btn_hover agency_banner_btn btn-bg btn-bg-grey">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
