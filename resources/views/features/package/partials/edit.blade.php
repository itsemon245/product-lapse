@extends('layouts.feature.index', ['title'=> 'Packages'])
@section('main')
<div id="hx-edit-package" class="sign_info">
    <div class="login_info">
        <h2 class=" f_600 f_size_24 t_color3 mb_40">Edit package</h2>
                <form hx-post="{{ route('package.store') }}" class="login-form sign-in-form">
                    @csrf
                    <div class="row">
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="name" value="Package name" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" placeholder="Enter package name" name="name" :value="$datum->name" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="price" value="Package price" />
                            <x-text-input id="price" class="block mt-1 w-full" type="text" placeholder="Enter package price" name="price" :value="$datum->price" required autofocus />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="monthly_rate" value="Monthly rate" />
                            <x-text-input id="monthly_rate" class="block mt-1 w-full" type="text" placeholder="Enter monthly rate" name="monthly_rate" :value="$datum->monthly_rate" required autofocus />
                            <x-input-error :messages="$errors->get('monthly_rate')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="annual_rate" value="Annual rate" />
                            <x-text-input id="annual_rate" class="block mt-1 w-full" type="text" placeholder="Enter annual rate" name="annual_rate" :value="$datum->annual_rate" required autofocus />
                            <x-input-error :messages="$errors->get('annual_rate')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-select-input label="Subscription type" id="annual_rate"  placeholder="Choose one" name="subscription_type" required autofocus> 
                                <option value="jmkk">Option</option>
                            </x-select-input>
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="features" value="Features" />
                            <x-text-input id="features" class="block mt-1 w-full" type="text" placeholder="Enter features" name="features" :value="$datum->features" required autofocus />
                            <x-input-error :messages="$errors->get('features')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="product_limit" value="Product limit" />
                            <x-text-input id="product_limit" class="block mt-1 w-full" type="date" name="product_limit" :value="$datum->product_limit" required autofocus />
                            <x-input-error :messages="$errors->get('product_limit')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="validity" value="Validity" />
                            <x-text-input id="validity" class="block mt-1 w-full" type="date" name="validity" :value="$datum->validity" required autofocus />
                            <x-input-error :messages="$errors->get('validity')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                            <x-input-label for="has_limited_features" value="Limited features" />
                            <x-text-input id="has_limited_features" class="block mt-1 w-full" type="text" name="has_limited_features" placeholder="Limited features" :value="$datum->has_limited_features" required autofocus />
                            <x-input-error :messages="$errors->get('has_limited_features')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-4 col-md-6">
                           
                            <x-checkbox-input class="ml-4" checked label="Set propular tag." />
                        </div>
                        
                        
                    </div>
                    
                    <div class="d-flex align-items-center text-center">
                        <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Add package</button>
                        <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg-grey" data-dismiss="modal">Cancel</button>
                    </div>
                </form>
    </div>
</div>
@endsection