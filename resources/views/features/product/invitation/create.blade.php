@extends('layouts.feature.index', ['title' => @__('feature/invitaion.title')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/invitaion.title'), 'route' => route('invitation.create')]]" />
        </x-slot:breadcrumb>
        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/invitaion.title')</h2>
            <form method="POST" action="{{ route('invitation.store') }}" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="first_name" value="{{ __('feature/invitaion.label.fname') }}" />
                        <x-input id="first_name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/invitaion.placeholder.fname') }}" name="first_name"
                            :value="old('first_name')" autofocus />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="last_name" value="{{ __('feature/invitaion.label.lname') }}" />
                        <x-input id="last_name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/invitaion.placeholder.fname') }}" name="last_name" :value="old('last_name')"
                            autofocus />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="email" value="{{ __('feature/invitaion.label.email') }}" />
                        <x-input id="email" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/invitaion.placeholder.email') }}" name="email" :value="old('email')"
                            autofocus />

                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="phone" value="{{ __('feature/invitaion.label.phone') }}" />
                        <x-input id="phone" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/invitaion.placeholder.phone') }}" name="phone" :value="old('phone')"
                            autofocus />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="position" value="{{ __('feature/invitaion.label.position') }}">
                            <x-input id="position" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('feature/invitaion.placeholder.position') }}" name="position"
                                :value="old('position')" autofocus />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="role" value="{{ __('feature/invitaion.label.role') }}" />
                        <x-input id="role" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/invitaion.placeholder.role') }}" name="role" :value="old('role')"
                            autofocus />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <label>@__('feature/invitaion.choose')</label>
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="checkbox remember">
                                        <label>
                                            <input type="checkbox" value="{{ $product->id }}" name="products[]">
                                            {{ $product->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                            @error('products')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>


                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/invitaion.submit')</button>
                </div>
            </form>
        </x-slot:from>
    </x-feature.create>
@endsection
