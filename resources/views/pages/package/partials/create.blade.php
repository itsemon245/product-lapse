@extends('layouts.admin.app', ['title' => 'Packages'])
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
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-input-label for="info_en" value="Package Info(English)" />
                                <x-input id="info_en" class="block mt-1 w-full" type="text"
                                    placeholder="Enter package info (english)" name="info_en" :value="old('info_en')" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-input-label for="info_ar" value="Package Info(Arabic)" />
                                <x-input id="info_ar" class="block mt-1 w-full" type="text"
                                    placeholder="Enter package info (Arabic)" name="info_ar" :value="old('info_ar')" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-8 col-md-6">
                                <x-select-input label="Package" id="package" placeholder="Choose one"
                                    name="package" autofocus>
                                    @if ($types)
                                        @forelse ($types as $category)
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
                                <x-input-label for="price" value="Price" />
                                <x-input id="price" class="block mt-1 w-full" type="text"
                                    placeholder="Price" name="price" :value="old('price')" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-input-label for="money_en" value="Money(English)" />
                                <x-input id="money_en" class="block mt-1 w-full" type="text"
                                    placeholder="Enter money (english)" name="money_en" :value="old('money_en')" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-input-label for="money_ar" value="Money(Arabic)" />
                                <x-input id="money_ar" class="block mt-1 w-full" type="text"
                                    placeholder="Enter money (Arabic)" name="money_ar" :value="old('money_ar')" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-input-label for="feature_one_en" value="Feature one(English)" />
                                <x-input id="feature_one_en" class="block mt-1 w-full" type="text"
                                    placeholder="Feature one (english)" name="feature_one_en" :value="old('feature_one_en')" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-input-label for="feature_one_ar" value="Feature one(Arabic)" />
                                <x-input id="feature_one_ar" class="block mt-1 w-full" type="text"
                                    placeholder="Feature one(Arabic)" name="feature_one_ar" :value="old('feature_one_ar')" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-input-label for="feature_two_en" value="Feature two(English)" />
                                <x-input id="feature_two_en" class="block mt-1 w-full" type="text"
                                    placeholder="Feature two (english)" name="feature_two_en" :value="old('feature_two_en')" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-input-label for="feature_two_ar" value="Feature two(Arabic)" />
                                <x-input id="feature_two_ar" class="block mt-1 w-full" type="text"
                                    placeholder="Feature two(Arabic)" name="feature_two_ar" :value="old('feature_two_ar')" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-input-label for="feature_three_en" value="Feature three(English)" />
                                <x-input id="feature_three_en" class="block mt-1 w-full" type="text"
                                    placeholder="Feature three (english)" name="feature_three_en" :value="old('feature_three_en')" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-input-label for="feature_three_ar" value="Feature three(Arabic)" />
                                <x-input id="feature_three_ar" class="block mt-1 w-full" type="text"
                                    placeholder="Feature three(Arabic)" name="feature_three_ar" :value="old('feature_three_ar')" autofocus />
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


