@extends('layouts.feature.index', ['title' => 'Edit Idea'])

@section('main')

<x-feature.edit>

    <x-slot:breadcrumb>
        <x-breadcrumb :list="[['label' => 'Edit Innovate', 'route' => route('idea.edit', $idea)]]" />
    </x-slot:breadcrumb>

    <x-slot:from>
        <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('idea.edit')</h2>
        <form action="{{ route('idea.update', ['idea' => base64_encode($idea->id)]) }}" method="POST"
            class="login-form sign-in-form" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="form-group text_box col-lg-12 col-md-12">
                    <x-input-label for="name" value="{{ __('feature/idea.title-add') }}" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text"
                        placeholder="{{ __('feature/idea.title-add')}}" name="name"
                        value="{{ $idea->name }}" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="form-group text_box col-lg-12 col-md-12">
                    <x-input-label for="owner" value="{{ __('feature/idea.name-input') }}" />
                    <x-text-input id="owner" class="block mt-1 w-full" type="text"
                        placeholder="{{ __('feature/idea.name-input') }}" name="owner"
                        value="{{ $idea->owner }}" required autofocus />
                    <x-input-error :messages="$errors->get('owner')" class="mt-2" />
                </div>
                <div class="form-group text_box col-lg-12">
                    <x-select-input label="{{ __('feature/idea.priority-input') }}" id="priority" placeholder="Choose one"
                        name="priority" required autofocus>
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
                            {{ $idea->priority == trans('idea.accepted') ? 'selected' : '' }}>
                            @lang('idea.accepted')
                        </option>
                        <option value="@lang('idea.refused')"
                            {{ $idea->priority == trans('idea.refused') ? 'selected' : '' }}>@lang('idea.refused')
                        </option>
                        <option value="@lang('idea.deleted')"
                            {{ $idea->priority == trans('idea.deleted') ? 'selected' : '' }}>@lang('idea.deleted')
                        </option>
                    </x-select-input>
                    <x-input-error :messages="$errors->get('priority')" class="mt-2" />
                </div>

                <div class="form-group text_box col-lg-12">
                    <x-input-label for="details" value="{{ __('feature/idea.details-input') }}" />
                    <x-textarea id="details" class="block mt-1 w-full" name="details"
                        value="{{ $idea->details }}" placeholder="{{ __('feature/idea.details-input') }}"
                        cols="30" rows="10" required autofocus />
                    <x-input-error :messages="$errors->get('details')" class="mt-2" />
                </div>

                <div class="form-group text_box col-lg-12">
                    <x-input-label for="requirements" value="{{ __('feature/idea.requirements-input') }}" />
                    <x-textarea id="requirements" class="block mt-1 w-full" name="requirements"
                        value="{{ $idea->requirements }}"
                        placeholder="{{ __('feature/idea.requirements-input') }}" cols="30" rows="10"
                        required autofocus />
                    <x-input-error :messages="$errors->get('requirements')" class="mt-2" />
                </div>
            </div>

            <div class="d-flex align-items-center text-center">
                <button type="submit"
                    class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">{{ __('feature/idea.title-add') }}</button>
                <a href="{{ route('idea.index') }}"
                    class="btn_hover agency_banner_btn btn-bg btn-bg-grey">{{ __('feature/idea.cancel-btn') }}</a>
            </div>
        </form>
    </x-slot:from>

</x-feature.edit>
@endsection
