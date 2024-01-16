@extends('layouts.feature.index', ['title' => 'Edit Delivery'])
@section('main')
    <div id="hx-edit-package" class="sign_info">
        <div class="login_info">
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Edit Delivery</h2>
            <form method="POST" action="{{ route('delivery.update', base64_encode($delivery->id)) }}"
                class="login-form sign-in-form" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="name" value="Delivery name" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="Enter change request name" name="name" value="{{ $delivery->name }}" required
                            autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <div class="form-group text_box col-12">
                        <x-textarea label="Change request items" name="items" value="{{ $delivery->items }}"
                            placeholder="Write details..." required autfocus />
                        <x-input-error :messages="$errors->get('items')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-input-label for="link" value="Delivery link" />
                        <x-text-input id="link" class="block mt-1 w-full" type="text" placeholder="https://"
                            name="link" value="{{ $delivery->link }}" required autofocus />
                        <x-input-error :messages="$errors->get('link')" class="mt-2" />
                    </div>

                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="password" value="Password" />
                        <x-text-input id="password" class="block mt-1 w-full" type="text" placeholder="Password"
                            name="password" value="{{ $delivery->password }}" required autofocus />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="administrator" value="Administrator" />
                        <x-text-input id="administrator" class="block mt-1 w-full" type="text"
                            placeholder="Administrator" name="administrator" value="{{ $delivery->administrator }}" required
                            autofocus />
                        <x-input-error :messages="$errors->get('administrator')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach label="Add Attach" name="add_attachments" />
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Edit
                        Delivery</button>
                    <a href="{{ route('delivery.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
