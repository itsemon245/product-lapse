@extends('layouts.admin.app', ['title' => __('Edit Package')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Edit Package'), 'route' => route('package.create')]]" />
        </x-slot:breadcrumb>
        <div class="sign_info">
            <div class="login_info">
                <x-slot:from>
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('Edit Package')</h2>
                    <form action="{{ route('package.update', $package) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="form-group mb-2 text_box col-md-6">
                                <div class="flex justify-between">
                                    <x-input-label class="flex-shrink" for="name" value="{{ __('Name (en)') }}" />

                                </div>
                                <x-input id="name" class="block mt-1 w-full" type="text" placeholder="{{ __('Name (en)') }}"
                                    name="name[en]" :value="$package->name->en ?? old('name[en]')" autofocus />
                            </div>
                            <div class="form-group mb-2 text_box col-md-6">
                                <x-input-label class="flex-shrink" for="name" value="{{ __('Name (ar)') }}" />
                                <x-input id="name" class="block mt-1 w-full" type="text" placeholder="{{ __('Name (ar)') }}"
                                    name="name[ar]" :value="$package->name->ar ?? old('name[ar]')" autofocus />
                            </div>
                            <div class="form-group mb-2 text_box col-md-6">
                                <x-input-label for="price" value="{{ __('Price') }}" />
                                <x-input id="price" class="block mt-1 w-full" type="text" placeholder="{{ __('Price') }}"
                                    name="price" :value="$package->price ?? old('price')" autofocus />
                            </div>
                            <div class="form-group mb-2 text_box col-md-6">
                                <x-input-label for="product_limit" value="{{ __('Product limit') }}" />
                                <x-input id="product_limit" class="block mt-1 w-full" type="text"
                                    placeholder="{{ __('Product limit') }}" name="product_limit" :value="$package->product_limit ?? old('product_limit')" autofocus />
                            </div>
                            <div class="form-group mb-2 text_box col-md-6">
                                <div class="flex items-end">
                                    <div>
                                        <x-input-label for="validity" value="{{ __('Validity') }}" />
                                        <x-input id="validity" class="block mt-1 w-full" type="text"
                                            placeholder="{{ __('Validity') }}" name="validity" :value="$package->validity ?? old('validity')" autofocus />
                                    </div>
                                    <x-select-input name="unit" class="!mb-[30px] !w-[120px]">
                                        <option value="day" @selected($package->unit == 'day')>{{ __('Day') }}</option>
                                        <option value="month" @selected($package->unit == 'month')>{{ __('Month') }}</option>
                                        <option value="year" @selected($package->unit == 'year')>{{ __('Year') }}</option>
                                    </x-select-input>
                                </div>
                            </div>
                            <div class="form-group mb-2 text_box col-md-6 ">
                                <div class="flex items-center justify-start gap-4 px-2 md:gap-[3rem] md:px-[1rem] h-full">

                                    <div class="form-group text_box mb-0">
                                        <label class="flex items-center gap-2 md:gap-4">
                                            <input type="checkbox" name="is_popular"
                                            @if ($package->is_popular) checked @endif />
                                            <span>@__('Set as Popular')</span>
                                        </label>
                                        
                                    </div>
                                    <div class="form-group text_box mb-0">
                                        <label class="flex items-center gap-2 md:gap-4">
                                            <input type="checkbox" name="limited_feature"
                                                @if ($package->limited_feature) checked @endif />
                                            <span>@__('Limited feature')</span>
                                        </label>
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
                                                    name="features[]" @checked($package?->activeFeatures()?->find($feature->id) != null)>
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
                            <button type="submit"
                                class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('Update')</button>
                            <a href="{{ route('package.index') }}"
                                class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@lang('Cancel')</a>
                        </div>
                    </form>
                </x-slot:from>
            </div>
        </div>
    </x-feature.create>
@endsection
