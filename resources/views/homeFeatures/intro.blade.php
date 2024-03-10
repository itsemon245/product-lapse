@extends('layouts.admin.app', ['title' => __('Edit Intro')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Edit Intro'), 'route' => route('edit.intro')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('Edit Intro')</h2>
            <form action="{{ route('intro.update', $info->id) }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="login_info">

                    <div class="row">
                        <x-attach label="{{ __('Add Image') }}" name='image' />
                    </div>

                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Title (English)') }}" id="title_en" type="text"
                                placeholder="{{ __('Title (English)') }}" name="title_en" :value="$info->home->title->en" required autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Title (Arabic)') }}" id="title_ar" type="text"
                                placeholder="{{ __('Title (Arabic)') }}" name="title_ar" :value="$info->home->title->ar" required autofocus />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Caption (English)') }}" id="caption_en" type="text"
                                placeholder="{{ __('Caption (English)') }}" name="caption_en" :value="$info->home->caption->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Caption (Arabic)') }}" id="caption_ar" type="text"
                                placeholder="{{ __('Caption (Arabic)') }}" name="caption_ar" :value="$info->home->caption->ar" required
                                autofocus />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Button Text (English)') }}" id="button_en" type="text"
                                placeholder="{{ __('Button Text (English)') }}" name="button_en" :value="$info->home->button->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Button Text (Arabic)') }}" id="button_ar" type="text"
                                placeholder="{{ __('Button Text (Arabic)') }}" name="button_ar" :value="$info->home->button->ar" required
                                autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Package Caption (English)') }}" id="package_en" type="text"
                                placeholder="{{ __('Package Caption (English)') }}" name="package_en" :value="$info->package->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Package Caption (Arabic)') }}" id="package_ar" type="text"
                                placeholder="{{ __('Package Caption (Arabic)') }}" name="package_ar" :value="$info->package->ar" required
                                autofocus />
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center text-center gap-2">
                    <x-button>{{ __('Submit') }}</x-button>
                    <x-button type="link" :href="route('features.index')" color="secondary">{{ __('Cancel') }}</x-button>
                </div>
            </form>

        </x-slot:from>
    </x-feature.create>
@endsection
