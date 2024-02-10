@extends('layouts.subscriber.app', ['title' => @__('feature/delivery.edit')])
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
                        <x-input id="name" label="{{ __('feature/delivery.label.name') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/delivery.placeholder.name') }}" name="name"
                            value="{{ $delivery->name }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input id="link" label="{{ __('feature/delivery.label.link') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/delivery.placeholder.link') }}" name="link"
                            value="{{ $delivery->link }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-12">
                        <x-textarea label="{{ __('feature/delivery.label.items') }}" name="items"
                            placeholder="{{ __('feature/delivery.placeholder.items') }}" required
                            autfocus>{{ $delivery->items }}</x-textarea>
                    </div>
                
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input id="username" label="{{ __('feature/delivery.label.user') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/delivery.placeholder.user') }}" name="username"
                            value="{{ $delivery->username }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input id="password" label="{{ __('feature/delivery.label.password') }}"
                            class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/delivery.placeholder.password') }}" name="password"
                            value="{{ $delivery->password }}" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/delivery.label.administrator') }}" id="administrator"
                        placeholder="{{ __('feature/delivery.placeholder.administrator') }}" name="administrator" required autofocus>
                        @if ($users)
                            @forelse ($users as $user)
                            {{-- {{ dd($delivery) }} --}}
                                <option value="{{ $user->id }}" {{ $delivery->administrator == $user->id ? 'Selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @empty
                                <option disabled>No category available</option>
                            @endforelse
                        @endif
                    </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach label="{{ __('feature/delivery.label.attachments') }}" name="add_attachments[]" />
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
