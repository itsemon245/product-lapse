@extends('layouts.feature.index', ['title' => 'Edit Product Stage'])
@section('main')
    <div id="hx-create-package" class="sign_info">
        <h2 class=" f_600 f_size_24 t_color3 mb_40">Add package</h2>
        <form action="{{ route('product-stage.update', ['product_stage' => base64_encode($stage->id)]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group text_box col-lg-4 col-md-6">
                    <x-input-label for="name" value="Package name" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" placeholder="Enter stage name"
                        name="name" :value="$stage->name ?? old('name')" required autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
                <div class="form-group text_box col-lg-4 col-md-6">
                    <x-input-label for="price" value="Text Color" />
                    <x-text-input id="price" class="block mt-1 w-full" type="text" placeholder="Enter text color"
                        name="text_color" :value="$stage->text_color ?? old('text_color')" required autofocus />
                    <x-input-error :messages="$errors->get('text_color')" class="mt-2" />
                </div>
            </div>

            <div class="d-flex align-items-center text-center">
                <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Update
                    Stage</button>
                <a class="btn_hover agency_banner_btn btn-bg btn-bg-grey"
                    href="{{ route('product-stage.index') }}">Cancel</a>
            </div>
        </form>
    </div>
    </div>
@endsection
