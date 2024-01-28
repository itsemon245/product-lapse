@extends('layouts.feature.index', ['title' => @__('feature/product.edit')])
@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' =>  @__('feature/product.edit'), 'route' => route('product.edit', $product)]]" />
        </x-slot:breadcrumb>
        <div class="sign_info">
            <div class="login_info">
                <x-slot:from>
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/product.edit')</h2>
                    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data" class="login-form sign-in-form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="name" :value="__('feature/product.label.name')" />
                                <x-text-input id="name" class="block mt-1 w-full" type="text"
                                    :placeholder="__('feature/product.placeholder.name')" name="name" :value="$product->name" required autofocus />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="url" :value="__('feature/product.label.url')" />
                                <x-text-input id="url" class="block mt-1 w-full" type="text" :placeholder="__('feature/product.placeholder.url')"
                                    name="url" :value="$product->url" required autofocus />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-select-input :label="__('feature/product.label.stage')" id="stage" placeholder="Choose one" name="stage" required
                                    autofocus>
                                    <option value="one">One</option>
                                    <option value="two">Two</option>
                                    <option value="three">Three</option>
                                    <option value="four">Four</option>
                                </x-select-input>
                            </div>
                            <div class="form-group text_box col-lg-8 col-md-6">
                                <x-textarea :placeholder="__('feature/product.label.description')" rows="5" cols="10" name="description"
                                    :label="__('feature/product.placeholder.description')"> {{ $product->description }} </x-textarea>
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-attach :label="__('feature/product.label.logo')" name='logo' />
                            </div>
                        </div>
        
                        <div class="d-flex align-items-center text-center">
                            <x-btn-primary name="{{ __('feature/product.submit') }}" type="submit" />
                            <x-btn-secondary name="{{ __('feature/product.cancel') }}" />
                        </div>
                    </form>
                </x-slot:from>
            </div>
        </div>
    </x-feature.edit>
@endsection
