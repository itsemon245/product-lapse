@extends('layouts.subscriber.app', ['title' => @__('feature/product.edit')])
@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/product.edit'), 'route' => route('product.edit', $product)]]" />
        </x-slot:breadcrumb>
        <div class="sign_info">
            <div class="login_info">
                <x-slot:from>
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/product.edit')</h2>
                    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data"
                        class="login-form sign-in-form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="name" :value="__('feature/product.label.name')" />
                                <x-input id="name" class="" type="text" :placeholder="__('feature/product.placeholder.name')" name="name"
                                    :value="$product->name" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-select-input :label="__('feature/product.label.stage')" id="stage" placeholder="Choose one" name="stage"
                                    autofocus>
                                    @isset ($stages)
                                        @forelse ($stages as $stage)
                                            <option value="<?= $stage->value->{app()->getLocale()} ?>"
                                                @selected($stage->value->{app()->getLocale()} == $product->stage)>
                                                <?= $stage->value->{app()->getLocale()} ?>
                                            </option>
                                        @empty
                                            <option disabled>No stages available</option>
                                        @endforelse
                                    @endisset
                                </x-select-input>
                            </div>
                            <div class="form-group text_box col-lg-4 col-md-6">
                                <x-input-label for="url" :value="__('feature/product.label.url')" />
                                <x-input id="url" class="" type="text" :placeholder="__('feature/product.placeholder.url')" name="url"
                                    :value="$product->url" autofocus />
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-select-input :label="__('feature/product.label.category')" id="category" placeholder="Choose one" name="category"
                                    autofocus>
                                    @isset ($categories)
                                        @forelse ($categories as $category)
                                            <option value="<?= $category->value->{app()->getLocale()} ?>"
                                                @selected($category->value->{app()->getLocale()} == $product->category)>
                                                <?= $category->value->{app()->getLocale()} ?>
                                            </option>
                                        @empty
                                            <option disabled>No categories available</option>
                                        @endforelse
                                    @endisset
                                </x-select-input>
                            </div>
                            <div class="form-group text_box col-lg-6 col-md-6">
                                <x-input class="input-file" type='file' placeholder="Choose Logo" :label="__('feature/product.label.logo')"
                                    name='logo' />
                            </div>
                            <div class="form-group text_box col-lg-12 col-md-6">
                                <x-textarea placeholder="{{ __('feature/product.label.description') }}" rows="5"
                                    cols="10" name="description"
                                    label="{{ __('feature/product.placeholder.description') }}">
                                    {!! $product->description !!}
                                </x-textarea>
                            </div>



                        </div>

                        <div class="d-flex align-items-center text-center">
                            <x-button name="{{ __('feature/product.submit') }}" type="submit">{{  __('feature/product.edit') }}</x-button>
                            <x-button type="link" href="{{route('product.index')}}" color="secondary">{{  __('feature/product.cancel') }}</x-button>
                        </div>
                    </form>
                </x-slot:from>
            </div>
        </div>
    </x-feature.edit>
@endsection
