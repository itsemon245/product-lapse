@extends('layouts.subscriber.app', ['title' => @__('feature/delivery.add')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/delivery.add'), 'route' => route('delivery.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">{{ __('feature/delivery.add') }}</h2>
            <form method="post" action="{{ route('delivery.store') }}" enctype="multipart/form-data"
                class="login-form sign-in-form">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input id="name" label="{{ __('feature/delivery.label.name') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/delivery.placeholder.name') }}" name="name"
                            :value="old('name')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input id="link" label="{{ __('feature/delivery.label.link') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/delivery.placeholder.link') }}" name="link"
                            :value="old('link')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea placeholder="{{ __('feature/delivery.placeholder.items') }}" rows="5"
                            cols="10" name="items" label="{{ __('feature/delivery.label.items') }}" :value="old('items')"
                            required autofocus>
                        </x-textarea>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input id="username" label="{{ __('feature/delivery.label.user') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/delivery.placeholder.user') }}" name="username"
                            :value="old('username')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input id="password" label="{{ __('feature/delivery.label.password') }}"
                            class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/delivery.placeholder.password') }}" name="password"
                            :value="old('password')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/delivery.label.administrator') }}" id="administrator"
                            placeholder="{{ __('feature/delivery.placeholder.administrator') }}" name="administrator"
                            required autofocus>
                            @if ($users)
                                @forelse ($users as $user)
                                    <option value="{{ $user->id }}">
                                        {{ $user->name }}
                                    </option>
                                @empty
                                    <option disabled>No category available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach label="{{ __('feature/delivery.attachments') }}" class="block mt-1 w-full"
                            name="add_attachments" />
                    </div>
                </div>
                <div class="d-flex align-items-center text-center">
                    <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">
                        @__('feature/delivery.submit')
                    </button>
                    <a href="{{ route('delivery.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/delivery.cancel')</a>
                </div>
            </form>
        </x-slot:from>
    </x-feature.create>
@endsection
