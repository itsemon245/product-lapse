@extends('layouts.subscriber.app', ['title' => @__('welcome.edit_package')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('welcome.edit_package'), 'route' => route('edit.package', $package->id)]]" />
        </x-slot:breadcrumb>
        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('welcome.edit_package')</h2>
            <form action="{{ route('package.update', $package->id) }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="login_info">
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.name') }}" id="name_en" type="text"
                                placeholder="{{ __('welcome.name') }}" name="name_en" :value="$package->name->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.name') }}" id="name_ar" type="text"
                                placeholder="{{ __('welcome.name') }}" name="name_ar" :value="$package->name->ar" required
                                autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.price_field') }}" id="price" type="text"
                                placeholder="{{ __('welcome.price_field') }}" name="price" :value="$package->price" required
                                autofocus />

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.feature') }}" id="feature_en" type="text"
                                placeholder="{{ __('welcome.feature') }}" name="feature_en" :value="$package->features->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.feature') }}" id="feature_ar" type="text"
                                placeholder="{{ __('welcome.feature') }}" name="feature_ar" :value="$package->features->ar" required
                                autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.product_limit') }}" id="product_limit_en" type="text"
                                placeholder="{{ __('welcome.product_limit') }}" name="product_limit_en" :value="$package->product_limit->en"
                                required autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.product_limit') }}" id="product_limit_ar" type="text"
                                placeholder="{{ __('welcome.product_limit') }}" name="product_limit_ar" :value="$package->product_limit->ar"
                                required autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.validity') }}" id="validity_en" type="text"
                                placeholder="{{ __('welcome.validity') }}" name="validity_en" :value="$package->validity->en ?? ''" />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.validity') }}" id="validity_ar" type="text"
                                placeholder="{{ __('welcome.validity') }}" name="validity_ar" :value="$package->validity->ar ?? ''" />
                        </div>
                    </div>
                    <div class="row mt-2 mb-4">
                        <div class="checkbox remember">
                            <label>
                                <input type="checkbox" name="is_popular" {{ $package->is_popular ? 'checked' : '' }}>
                                {{ __('welcome.is_popular') }}
                            </label>
                        </div>
                    </div>

                </div>

                <div class="d-flex align-items-center text-center gap-2">
                    <x-button>Submit</x-button>
                    <x-button type="link" :href="route('features.index')" color="secondary">Cancel</x-button>
                </div>
            </form>

        </x-slot:from>
    </x-feature.create>
@endsection
