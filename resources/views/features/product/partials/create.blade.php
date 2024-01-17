@extends('layouts.feature.index', ['title' => 'Product'])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Product', 'route' => route('product.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Add Product</h2>
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="login-form sign-in-form">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="name" value="Product name" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="Enter product name" name="name" :value="old('name')" autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-select-input label="Stage" id="stage" placeholder="Choose one" name="stage"
                            autofocus>
                            <option value="one">One</option>
                            <option value="two">Two</option>
                            <option value="three">Three</option>
                            <option value="four">Four</option>
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="url" value="Product url" />
                        <x-text-input id="url" class="block mt-1 w-full" type="text" placeholder="https://"
                            name="url" :value="old('url')" autofocus />
                        <x-input-error :messages="$errors->get('url')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="Stage" id="stage" placeholder="Choose one" name="stage"
                            autofocus>
                            <option value="one">One</option>
                            <option value="two">Two</option>
                            <option value="three">Three</option>
                            <option value="four">Four</option>
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach name='logo' />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea placeholder="Write description" rows="5" cols="10" name="description"
                            label="Description" />
                    </div>
                    


                </div>

                <div class="d-flex align-items-center text-center">
                    <x-btn-primary name="Add Product" type="submit" />
                </form>
                    <x-btn-secondary type="reset" name="Cancel" />
                </div>

        </x-slot:from>
    </x-feature.create>
@endsection
