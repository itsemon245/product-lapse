@extends('layouts.subscriber.app', ['title' => @__('feature/invitation.label.title')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/invitation.label.title'), 'route' => route('invitation.create')]]" />
        </x-slot:breadcrumb>
        <x-slot:from>

            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/invitation.label.title')</h2>
            <form method="POST" action="{{ route('invitation.store') }}" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input id="first_name" label="{{ __('feature/invitation.label.fname') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/invitation.placeholder.fname') }}" name="first_name"
                            :value="old('first_name')" required autofocus />

                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input id="last_name" label="{{ __('feature/invitation.label.lname') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/invitation.placeholder.lname') }}" name="last_name"
                            :value="old('last_name')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input id="email" label="{{ __('feature/invitation.label.email') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/invitation.placeholder.email') }}" name="email"
                            :value="old('email')" required autofocus />
                    </div>

                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input id="phone" label="{{ __('feature/invitation.label.phone') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/invitation.placeholder.phone') }}" name="phone"
                            :value="old('phone')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-select-input :label="__('feature/invitation.label.role')" id="role" placeholder="Choose one" name="role" autofocus>
                            @if ($roles)
                                @forelse ($roles as $role)
                                    <option value="{{ $role->name }}" @selected($role->name == old('role')) class="capitalize">
                                        @lang($role->name)
                                    </option>
                                @empty
                                    <option disabled>
                                        @lang('No items available')
                                    </option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>

                    <div class="form-group text_box col-lg-12 col-md-12">
                        <label class=" text_c f_500">@__('feature/invitation.choose')</label>
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-lg-4 col-md-6">
                                    <div class="checkbox remember">
                                        <label>
                                            <input type="checkbox" @checked($product->name == old('products')) value="{{ $product->id }}" name="products[]" />
                                            {{ $product->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @error('products')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>



                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/invitation.submit')</button>
                </div>
            </form>
        </x-slot:from>
    </x-feature.create>
@endsection
