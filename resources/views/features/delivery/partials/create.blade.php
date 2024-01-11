@extends('layouts.feature.index', ['title'=> 'Delivery'])
@section('main')
<div id="hx-create-delivery" class="sign_info">
    <div class="login_info">
        <h2 class=" f_600 f_size_24 t_color3 mb_40">Add Delivery</h2>
                <form method="post" action="{{ route('delivery.store') }}" enctype="multipart/form-data" class="login-form sign-in-form">
                    @csrf
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input-label for="name" value="Delivery name" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" placeholder="Enter change request name" name="name" :value="old('name')" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input-label for="items" value="Change request items" />
                            <x-text-input id="items" class="block mt-1 w-full" type="text" placeholder="Delivery items" name="items" :value="old('items')" required autofocus />
                            <x-input-error :messages="$errors->get('items')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-12 col-md-6">
                            <x-input-label for="link" value="Delivery link" />
                            <x-text-input id="link" class="block mt-1 w-full" type="text" placeholder="https://" name="link" :value="old('link')" required autofocus />
                            <x-input-error :messages="$errors->get('link')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                           <x-attach label="Attach" name="attach_file" />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input-label for="password" value="Password" />
                            <x-text-input id="password" class="block mt-1 w-full" type="text" placeholder="Password" name="password" :value="old('password')" required autofocus />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input-label for="administrator" value="Administrator" />
                            <x-text-input id="administrator" class="block mt-1 w-full" type="text" placeholder="Administrator" name="administrator" :value="old('administrator')" required autofocus />
                            <x-input-error :messages="$errors->get('administrator')" class="mt-2" />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-attach label="Add Attach" name="add_attachments" />
                         </div>                     
                    </div>
                    
                    <div class="d-flex align-items-center text-center">
                        <x-btn-primary name="Add Delivery" type="submit" />
                        <x-btn-secondary name="Cancel" />
                    </div>
                </form>
    </div>
</div>
@endsection