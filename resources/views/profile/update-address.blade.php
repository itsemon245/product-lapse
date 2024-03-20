@extends('layouts.frontend.app', ['title' => @__('profile.profile.info')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('profile.address.update-address'), 'route' => '']]" />
        </x-slot:breadcrumb>
        <x-slot:from>

            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                        @__('profile.address.update-address')
                    </h2>

                    <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                        @__('profile.address.description')
                    </p>
                </header>
                <form action="{{ route('address.update') }}" method="POST">
                    @csrf
                    <div class="row" id="#address">
                        <div class="form-group mb-2 text_box col-md-6">
                            <div class="flex justify-between">
                                <x-input-label class="flex-shrink" for="name" value="{{ __('profile.address.name') }}" />
                            </div>
                            <x-input required id="name" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('profile.address.name') }}" name="name" :value="auth()?->user()?->billingAddress()->name ??
                                    (auth()?->user()?->name ?? old('name'))" />
                        </div>

                        <div class="form-group mb-2 text_box col-md-6">
                            <div class="flex justify-between">
                                <x-input-label class="flex-shrink" for="email"
                                    value="{{ __('profile.address.email') }}" />
                            </div>
                            <x-input required id="email" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('profile.address.eamil') }}" name="email" :value="auth()?->user()?->billingAddress()->email ??
                                    (auth()?->user()?->email ?? old('email'))" />
                        </div>
                        <div class="form-group mb-2 text_box col-md-6">
                            <div class="flex justify-between">
                                <x-input-label class="flex-shrink" for="phone"
                                    value="{{ __('profile.address.phone') }}" />
                            </div>
                            <x-input required id="phone" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('profile.address.phone') }}" name="phone" :value="auth()?->user()?->billingAddress()->phone ??
                                    (auth()?->user()?->phone ?? old('phone'))" />
                        </div>
                        <div class="form-group mb-2 text_box col-md-6">
                            <div class="flex justify-between">
                                <x-input-label class="flex-shrink" for="city"
                                    value="{{ __('profile.address.city') }}" />
                            </div>
                            <x-input required id="city" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('profile.address.city') }}" name="city" :value="auth()?->user()?->billingAddress()->city ?? old('city')" />
                        </div>
                        <div class="form-group mb-2 text_box col-md-6">
                            <div class="flex justify-between">
                                <x-input-label class="flex-shrink" for="street"
                                    value="{{ __('profile.address.street') }}" />
                            </div>
                            <x-input required id="street" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('profile.address.street') }}" name="street" :value="auth()?->user()?->billingAddress()->street ?? old('street')" />
                        </div>
                        <div class="form-group mb-2 text_box col-md-6">
                            <div class="flex justify-between">
                                <x-input-label class="flex-shrink" for="country"
                                    value="{{ __('profile.address.country') }}" />
                            </div>
                            <x-input required id="country" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('profile.address.country') }}" name="country" :value="auth()?->user()?->billingAddress()->country ?? old('country')" />
                        </div>
                        <div class="form-group mb-2 text_box col-md-6">
                            <div class="flex justify-between">
                                <x-input-label class="flex-shrink" for="zip"
                                    value="{{ __('profile.address.zip') }}" />
                            </div>
                            <x-input required id="zip" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('profile.address.zip') }}" name="zip" :value="auth()?->user()?->billingAddress()->zip ?? old('zip')" />
                        </div>
                        <div class="form-group mb-2 text_box col-md-6">
                            <div class="flex justify-between">
                                <x-input-label class="flex-shrink" for="state"
                                    value="{{ __('profile.address.state') }}" />
                            </div>
                            <x-input required id="state" class="block mt-1 w-full" type="text"
                                placeholder="{{ __('profile.address.state') }}" name="state" :value="auth()?->user()?->billingAddress()->state ?? old('state')" />
                        </div>
                    </div>
                    <x-button>{{ __('profile.password.save') }}</x-button>
                </form>
            </section>
        </x-slot:from>
    </x-feature.create>
@endsection
