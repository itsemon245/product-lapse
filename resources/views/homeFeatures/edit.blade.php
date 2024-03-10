@extends('layouts.admin.app', ['title' => __('Feature Edit')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Feature Edit'), 'route' => route('features.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('Feature Edit')</h2>
            <form action="{{ route('features.update', $feature) }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="login_info">
                    <div class="row">
                        <x-attach label="{{ __('Add Image') }}" name='image' />
                    </div>
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Question (English)') }}" id="title_en" type="text"
                                placeholder="{{ __('Question (English)') }}" name="title_en" :value="$feature->title->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Question (Arabic)') }}" id="title_ar" type="text"
                                placeholder="{{ __('Question (Arabic)') }}" name="title_ar" :value="$feature->title->ar" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Answer (English)') }}" id="caption_en" type="text"
                                placeholder="{{ __('Answer (English)') }}" name="caption_en" :value="$feature->caption->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Answer (Arabic)') }}" id="caption_ar" type="text"
                                placeholder="{{ __('Answer (Arabic)') }}" name="caption_ar" :value="$feature->caption->ar" required
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
