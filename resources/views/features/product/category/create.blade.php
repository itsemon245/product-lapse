@extends('layouts.feature.index', ['title' => 'Product Category'])
@section('main')
    <div id="hx-create-package" class="sign_info">
        <div class="login_info">
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Add Category</h2>
            <form action="{{ route('product-category.store') }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="name" value="Package name" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="Enter category name" name="name" :value="old('name')" required autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="price" value="Text Color" />
                        <x-text-input id="price" class="block mt-1 w-full" type="text" placeholder="Enter text color"
                            name="text_color" :value="old('text_color')" required autofocus />
                        <x-input-error :messages="$errors->get('text_color')" class="mt-2" />
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Add
                        Category</button>
                    <a class="btn_hover agency_banner_btn btn-bg btn-bg-grey"
                        href="{{ route('product-category.index') }}">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
