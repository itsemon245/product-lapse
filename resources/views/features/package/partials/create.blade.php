@extends('layouts.feature.index', ['title' => 'Packages'])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Package', 'route' => route('package.create')]]" />
        </x-slot:breadcrumb>
        <div class="sign_info">
            <div class="login_info">
                <x-slot:from>
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">Add package</h2>
                    <form action="{{ route('package.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="name" value="Package name" />
                                <x-input id="name" class="block mt-1 w-full" type="text"
                                    placeholder="Enter package name" name="name" :value="old('name')" autofocus />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="price" value="Package price" />
                                <x-input id="price" class="block mt-1 w-full" type="text"
                                    placeholder="Enter package price" name="price" :value="old('price')" autofocus />
                                <x-input-error :messages="$errors->get('price')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="monthly_rate" value="Monthly rate" />
                                <x-input id="monthly_rate" class="block mt-1 w-full" type="text"
                                    placeholder="Enter monthly rate" name="monthly_rate" :value="old('monthly_rate')" autofocus />
                                <x-input-error :messages="$errors->get('monthly_rate')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="annual_rate" value="Annual rate" />
                                <x-input id="annual_rate" class="block mt-1 w-full" type="text"
                                    placeholder="Enter annual rate" name="annual_rate" :value="old('annual_rate')" autofocus />
                                <x-input-error :messages="$errors->get('annual_rate')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-select-input label="Subscription type" id="annual_rate" placeholder="Choose one"
                                    name="subscription_type" autofocus>
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
                                    placeholder="Enter features" name="features" :value="old('features')" autofocus />
                                <x-input-error :messages="$errors->get('features')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="product_limit" value="Product limit" />
                                <x-input id="product_limit" class="block mt-1 w-full" type="date"
                                    name="product_limit" :value="old('product_limit')" autofocus />
                                <x-input-error :messages="$errors->get('product_limit')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="validity" value="Validity" />
                                <x-input id="validity" class="block mt-1 w-full" type="date" name="validity"
                                    :value="old('validity')" autofocus />
                                <x-input-error :messages="$errors->get('validity')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="has_limited_features" value="Limited features" />
                                <x-input id="has_limited_features" class="block mt-1 w-full" type="text"
                                    name="has_limited_features" placeholder="Limited features" :value="old('has_limited_features')"
                                    autofocus />
                                <x-input-error :messages="$errors->get('has_limited_features')" class="mt-2" />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">

                                <x-checkbox-input class="ml-4" name="is_popular" checked label="Set propular tag." />
                            </div>


                        </div>
                        <div class="d-flex align-items-center text-center">
                            <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Add
                                Package</button>
                            <a href="{{ route('package.index') }}"
                                class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@lang('task.cancel')</a>
                        </div>
                    </form>
                </x-slot:from>
            </div>
        </div>
    </x-feature.create>
@endsection
