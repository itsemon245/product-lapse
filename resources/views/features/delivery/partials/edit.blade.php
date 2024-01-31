@extends('layouts.feature.index', ['title' => @__('feature/delivery.edit')])
@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/delivery.edit'), 'route' => route('delivery.edit', $delivery)]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/delivery.edit')</h2>
            <form method="POST" action="{{ route('delivery.update', $delivery) }}" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="name" value="{{ __('feature/delivery.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/delivery.placeholder.name') }}" name="name"
                            value="{{ $delivery->name }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-12">
                        <x-textarea label="{{ __('feature/delivery.label.items') }}" name="items"
                            value="{{ $delivery->items }}" placeholder="{{ __('feature/delivery.placeholder.items') }}"
                            required autfocus />
                        <x-input-error :messages="$errors->get('items')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-input-label for="link" value="{{ __('feature/delivery.label.link') }}" />
                        <x-input id="link" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/delivery.placeholder.link') }}" name="link"
                            value="{{ $delivery->link }}" required autofocus />
                        <x-input-error :messages="$errors->get('link')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="user" value="{{ __('feature/delivery.label.user') }}" />
                        <x-input id="username" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/delivery.placeholder.user') }}" name="username"
                            value="{{ $delivery->username }}" required autofocus />
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="password" value="{{ __('feature/delivery.label.password') }}" />
                        <x-input id="password" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/delivery.placeholder.password') }}" name="password"
                            value="{{ $delivery->password }}" required autofocus />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="administrator" value="{{ __('feature/delivery.label.administrator') }}" />
                        <x-input id="administrator" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/delivery.placeholder.administrator') }}" name="administrator"
                            value="{{ $delivery->administrator }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach label="{{ __('feature/delivery.label.attachments') }}" name="add_attachments" />
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/delivery.edit')</button>
                    <a href="{{ route('delivery.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/delivery.cancel')</a>
                </div>
            </form>
        </x-slot:from>
    </x-feature.edit>
@endsection
