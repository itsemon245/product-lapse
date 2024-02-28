@extends('layouts.admin.app', ['title' => 'Packages'])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Edit Package', 'route' => route('package.create')]]" />
        </x-slot:breadcrumb>
        <div class="sign_info">
            <div class="login_info">
                <x-slot:from>
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">Edit package</h2>
                    <form action="{{ route('package.update', $package) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group mb-2 text_box col-md-6">
                                <div class="flex justify-between">
                                    <x-input-label class="flex-shrink" for="name" value="Name (en)" />

                                </div>
                                <x-input id="name" class="block mt-1 w-full" type="text" placeholder="Name"
                                    name="name[en]" :value="$package->name->en ?? old('name[en]')" autofocus />
                            </div>
                            <div class="form-group mb-2 text_box col-md-6">
                                <x-input-label class="flex-shrink" for="name" value="Name (ar)" />
                                <x-input id="name" class="block mt-1 w-full" type="text" placeholder="Name"
                                    name="name[ar]" :value="$package->name->ar ??  old('name[ar]')" autofocus />
                            </div>
                            <div class="form-group mb-2 text_box col-md-6">
                                <x-input-label for="price" value="Price" />
                                <x-input id="price" class="block mt-1 w-full" type="text" placeholder="Price"
                                    name="price" :value="$package->price ?? old('price')" autofocus />
                            </div>
                            <div class="form-group mb-2 text_box col-md-6">
                                <x-input-label for="product_limit" value="Product limit" />
                                <x-input id="product_limit" class="block mt-1 w-full" type="text"
                                    placeholder="Product limit" name="product_limit" :value="$package->product_limit ?? old('product_limit')" autofocus />
                            </div>
                            <div class="form-group mb-2 text_box col-md-6">
                                <div class="flex items-end">
                                    <div>
                                        <x-input-label for="validity" value="Validity" />
                                        <x-input id="validity" class="block mt-1 w-full" type="text"
                                            placeholder="Validity" name="validity" :value="$package->validity ??  old('validity')" autofocus />
                                    </div>
                                    <x-select-input name="unit" class="!mb-[30px] !w-[120px]">
                                        <option value="day" @selected($package->unit == 'day')>Day</option>
                                        <option value="month" @selected($package->unit == 'month')>Month</option>
                                        <option value="year" @selected($package->unit == 'year')>Year</option>
                                    </x-select-input>
                                </div>
                            </div>
                            <div class="form-group mb-2 text_box col-md-6 ">
                                <div class="flex items-center justify-start gap-[1rem] px-[1rem] h-full">

                                    <div class="form-group text_box mb-0 mr-2">
                                        <x-checkbox-input class="" name="is_popular" @checked($package->is_package) label="Set as Popular" />
                                    </div>
                                    <div class="form-group text_box mb-0 mr-2 ">
                                        <x-checkbox-input class="" name="limited_feature" @checked($package->limited_feature)
                                            label="Limited Features" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- list features --}}
                        <div class="form-group text_box col-lg-12 col-md-12">
                            <div class="flex justify-start gap-8 flex-wrap">
                                <label class=" text_c f_500">@__('Choose Package Features')</label>

                            </div>
                            <div class="row">
                                @foreach ($features as $feature)
                                    <div class="col-lg-4 col-md-6">
                                        <div class="checkbox remember">
                                            <label>
                                                <input type="checkbox" class="mr-3 p-2" value="{{ $feature->id }}"
                                                    name="features[]" @checked($package?->features()?->find($feature->id) != null)>
                                                {{ $feature->name->{app()->getLocale()} }}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @error('products')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center text-center">
                            <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Add
                                Package</button>
                            <a href="{{ route('package.index') }}"
                                class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@lang('package.cancel')</a>
                        </div>
                    </form>
                </x-slot:from>
            </div>
        </div>
    </x-feature.create>
@endsection
