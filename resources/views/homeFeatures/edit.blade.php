@extends('layouts.subscriber.app', ['title' => 'Feature Edit'])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Feature', 'route' => route('features.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Edit FAQ Item</h2>
            <form action="{{ route('features.update', $feature) }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="login_info">
                    <div class="row">
                        <x-attach label="Add Image" name='image' />
                    </div>
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Question (English)" id="title_en" type="text"
                                placeholder="Enter Question In English" name="title_en" :value="$feature->title->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Question (Arabic)" id="title_ar" type="text"
                                placeholder="Enter Question In Arabic" name="title_ar" :value="$feature->title->ar" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Answer (English)" id="caption_en" type="text"
                                placeholder="Enter Answer In English" name="caption_en" :value="$feature->caption->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Answer (Arabic)" id="caption_ar" type="text"
                                placeholder="Enter Answer In Arabic" name="caption_ar" :value="$feature->caption->ar" required
                                autofocus />
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center text-center gap-2">
                    <x-button>Submit</x-button>
                    <x-button type="link" :href="route('features.index')" color="secondary">Cancel</x-button>
                </div>
            </form>

        </x-slot:from>
    </x-feature.create>
@endsection
