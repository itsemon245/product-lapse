@extends('layouts.subscriber.app', ['title' => 'Select Menus'])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[
                ['label' => __('Select Menus'), 'route' => route('select.index')],
                ['label' => __('Edit'), 'route' => route('product.index')],
            ]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('Edit Select Item')</h2>
            <form action="{{ route('select.update', $select) }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="login_info">
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-select-input label="Feature Name" id="model-type" placeholder="Choose Feature Name"
                                name="model_type" autofocus>
                                @foreach ($features as $feature)
                                    <option value="{{ $feature->value }}" @selected($feature->value == $select->model_type)>
                                        {{ str($feature->value)->headline() }}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-select-input label="Type Of Item" id="type" placeholder="Choose Type" name="type"
                                autofocus>
                                @foreach ($types as $type)
                                    <option value="{{ $type->value }}" @selected($type->value == $select->type)>
                                        {{ str($type->value)->headline() }}</option>
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Name (English)" id="name_en" type="text" placeholder="Enter category name"
                                name="name_en" :value="$select->value->en" required autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">

                            <x-input label="Name (Arabic)" id="name_ar" type="text" placeholder="Enter category name"
                                name="name_ar" :value="$select->value->ar" required autofocus />
                        </div>
                        <div class="form-group text_box col-lg-12 col-md-6">
                            <x-select-input label="Select Text Color" id="color" placeholder="Choose Color"
                                name="text_color" autofocus>
                                @foreach ($colors as $color)
                                    <option class="text-capitalize" style="color: {{ $color->value }}"
                                        value="{{ $color->value }}" @selected($color->value == $select->color)>
                                        {{ str($color->name)->title() }}</option>
                                @endforeach
                            </x-select-input>
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
