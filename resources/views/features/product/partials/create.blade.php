@extends('layouts.feature.index', ['title' => 'Product'])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Product', 'route' => route('product.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Add Product</h2>
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data"
                class="login-form sign-in-form">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="name" value="Product name" />
                        <x-input id="name" class="" type="text" placeholder="Enter product name" name="name"
                            :value="old('name')" autofocus />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-select-input label="Stage" id="stage" placeholder="Choose one" name="stage" autofocus>
                            @if ($stages)
                                @forelse ($stages as $category)
                                    <option value="<?= $category->value->{app()->getLocale()} ?>">
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No stages available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-4 col-md-6">
                        <x-input-label for="url" value="Product url" />
                        <x-input id="url" class="" type="text" placeholder="https://" name="url"
                            :value="old('url')" autofocus />
                        <x-input-error :messages="$errors->get('url')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="Category" id="category" placeholder="Choose one" name="category" autofocus>
                            @if ($categories)
                                @forelse ($categories as $category)
                                    <option value="<?= $category->value->{app()->getLocale()} ?>">
                                        <?= $category->value->{app()->getLocale()} ?>
                                    </option>
                                @empty
                                    <option disabled>No categories available</option>
                                @endforelse
                            @endif
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input class="input-file" type='file' placeholder="Choose Logo" label="Logo"
                            name='logo' />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea placeholder="Write description" rows="5" cols="10" name="description"
                            label="Description">
                        </x-textarea>
                    </div>



                </div>

                <div class="d-flex align-items-center text-center">
                    <x-button>Add Product</x-button>
                    <x-button type="button" color="secondary">Cancel</x-button>
                </div>
            </form>

        </x-slot:from>
    </x-feature.create>
@endsection
