@extends('layouts.feature.index', ['title' => 'Packages'])
@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Package', 'route' => route('package.edit', $package)]]" />
        </x-slot:breadcrumb>
        <div class="sign_info">
            <div class="login_info">
                <x-slot:from>
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">Edit package</h2>
                    <form action="{{ route('package.update', $package) }}" method="POST" class="login-form sign-in-form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="name" value="Package name" />
                                <x-input id="name" class="block mt-1 w-full" type="text"
                                    placeholder="Enter package name" name="name" :value="$package->name" required autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="price" value="Package price" />
                                <x-input id="price" class="block mt-1 w-full" type="text"
                                    placeholder="Enter package price" name="price" :value="$package->price" required autofocus />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="monthly_rate" value="Monthly rate" />
                                <x-input id="monthly_rate" class="block mt-1 w-full" type="text"
                                    placeholder="Enter monthly rate" name="monthly_rate" :value="$package->monthly_rate" required
                                    autofocus />
                                <x-input-error :messages="$errors->get('monthly_rate')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="annual_rate" value="Annual rate" />
                                <x-input id="annual_rate" class="block mt-1 w-full" type="text"
                                    placeholder="Enter annual rate" name="annual_rate" :value="$package->annual_rate" required
                                    autofocus />
                                <x-input-error :messages="$errors->get('annual_rate')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-select-input label="Subscription type" id="annual_rate" placeholder="Choose one"
                                    name="subscription_type" required autofocus>
                                    @if ($type)
                                        @forelse ($type as $category)
                                            <option value="<?= $category->value->{app()->getLocale()} ?>">
                                                <?= $category->value->{app()->getLocale()} ?>
                                            </option>
                                        @empty
                                            <option disabled>No subscription type available</option>
                                        @endforelse
                                    @endif
                                </x-select-input>
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="features" value="Features" />
                                <x-input id="features" class="block mt-1 w-full" type="text"
                                    placeholder="Enter features" name="features" :value="$package->features" required autofocus />
                                <x-input-error :messages="$errors->get('features')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="product_limit" value="Product limit" />
                                <x-input id="product_limit" class="block mt-1 w-full" type="date"
                                    name="product_limit" :value="$package->product_limit" required autofocus />
                                <x-input-error :messages="$errors->get('product_limit')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="validity" value="Validity" />
                                <x-input id="validity" class="block mt-1 w-full" type="date" name="validity"
                                    :value="$package->validity" required autofocus />
                                <x-input-error :messages="$errors->get('validity')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="has_limited_features" value="Limited features" />
                                <x-input id="has_limited_features" class="block mt-1 w-full" type="text"
                                    name="has_limited_features" placeholder="Limited features" :value="$package->has_limited_features" required
                                    autofocus />
                                <x-input-error :messages="$errors->get('has_limited_features')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">

                                <x-checkbox-input class="ml-4" checked label="Set propular tag." />
                            </div>
                        </div>
                        <div class="d-flex align-items-center text-center">
                            <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Edit
                                package</button>
                            <a href="{{ route('package.index') }}"
                                class="btn_hover agency_banner_btn btn-bg btn-bg-grey">Cancel</a>
                        </div>
                    </form>
                </x-slot:from>
            </div>
        </div>
    </x-feature.edit>
@endsection
