@extends('layouts.subscriber.app', ['title' => @__('feature/product.add')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/product.add'), 'route' => route('product.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/product.add')</h2>
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                class="login-form sign-in-form">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="name" :value="__('feature/product.label.name')" />
                        <x-input id="name" class="" type="text" :placeholder="__('feature/product.placeholder.name')" name="name"
                            :value="old('name')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-select-input required :label="__('feature/product.label.stage')" id="stage" placeholder="Choose one" name="stage"
                            autofocus>
                            @if ($stages)
                                @forelse ($stages as $category)
                                    <option value="{{$category->id}}"
                                        @selected(old('stage') == $category->value->{app()->getLocale()})>
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No stages available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="url" :value="__('feature/product.label.url')" />
                        <x-input id="url" class="" type="text" :placeholder="__('feature/product.placeholder.url')" name="url"
                            :value="old('url')" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input required :label="__('feature/product.label.category')" id="category" placeholder="Choose one" name="category"
                            autofocus>
                            @if ($categories)
                                @forelse ($categories as $category)
                                    <option value="{{$category->id}}"
                                        @selected(old('category') == $category->value->{app()->getLocale()})>
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No categories available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input required class="input-file" type='file' placeholder="Choose Logo" :label="__('feature/product.label.logo')"
                            name='logo' />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea required placeholder="{{ __('feature/product.label.description') }}" rows="5"
                            cols="10" name="description"
                            label="{{ __('feature/product.placeholder.description') }}">{{ old('description') }}</x-textarea>
                    </div>



                </div>

                <div class="d-flex align-items-center text-center">
                    <x-button> @__('feature/product.submit')</x-button>
                    <x-button type="link" href="{{ route('product.index') }}"
                        color="secondary">{{ __('feature/product.cancel') }}</x-button>
                </div>
            </form>
        </x-slot:from>
    </x-feature.create>
@endsection
