@extends('layouts.feature.index', ['title'=> 'Product'])
@section('main')
<div id="hx-create-product" class="sign_info">
    <div class="login_info">
        <h2 class=" f_600 f_size_24 t_color3 mb_40">Add Product</h2>
                <form hx-post="{{ route('product.store') }}" class="login-form sign-in-form">
                    @csrf
                    <div class="row">
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="name" value="Product name" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" placeholder="Enter product name" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="url" value="Product url" />
                            <x-text-input id="url" class="block mt-1 w-full" type="text" placeholder="https://" name="url" :value="old('url')" required autofocus />
                            <x-input-error :messages="$errors->get('url')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-select-input label="Stage" id="stage"  placeholder="Choose one" name="stage" required autofocus> 
                                <option value="one">One</option>
                                <option value="two">Two</option>
                                <option value="three">Three</option>
                                <option value="four">Four</option>
                            </x-select-input>
                        </div>
                        <div class="form-group text_box col-lg-8 col-md-6">
                            <x-textarea placeholder="Write description" rows="5" cols="10" name="description" label="Description" />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-attach name='logo' />
                        </div>
                        
                        
                    </div>
                    
                    <div class="d-flex align-items-center text-center">
                        <x-btn-primary name="Add Product" type="submit" />
                        <x-btn-secondary name="Cancel" />
                    </div>
                </form>
    </div>
</div>
@endsection