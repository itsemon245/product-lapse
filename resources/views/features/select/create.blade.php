@extends('layouts.subscriber.app', ['title' => 'Select Menus'])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Select Menu', 'route' => route('product.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Add Select Item</h2>
            <form action="{{ route('select.store') }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                <div class="login_info">
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-select-input label="Feature Name" id="model-type" placeholder="Choose Feature Name"
                                name="model_type" autofocus>
                                @foreach ($features as $feature)
                                    <option value="{{ $feature->value }}">{{ str($feature->value)->headline() }}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-select-input label="Type Of Item" id="type" placeholder="Choose Type" name="type"
                                autofocus>
                                @foreach ($types as $type)
                                    <option value="{{ $type->value }}">{{ str($type->value)->headline() }}</option>
                                @endforeach
                            </x-select-input>
                        </div>

                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Name (English)" id="name_en" type="text" placeholder="Enter category name"
                                name="name_en" :value="old('name_en')" required autofocus />
                            <x-input-error :messages="$errors->get('name_en')" class="mt-2" />
                        </div>

                        <div class="form-group text_box col-lg-6 col-md-6">

                            <x-input label="Name (Arabic)" id="name_ar" type="text" placeholder="Enter category name"
                                name="name_ar" :value="old('name_ar')" required autofocus />
                            <x-input-error :messages="$errors->get('name_ar')" class="mt-2" />
                        </div>

                        <div class="form-group text_box col-lg-12 col-md-6">
                            <x-input label="Text Color" id="text-color" type="color" placeholder="Enter text color"
                                name="text_color" :value="old('text_color')" required autofocus />
                            <x-input-error :messages="$errors->get('text_color')" class="mt-2" />
                        </div>


                    </div>
                </div>

                <div class="d-flex align-items-center text-center gap-2">
                    <x-button>Submit</x-button>
                    <x-button type="link" :href="route('select.index')" color="secondary">Cancel</x-button>
                </div>
            </form>

        </x-slot:from>
    </x-feature.create>
@endsection
