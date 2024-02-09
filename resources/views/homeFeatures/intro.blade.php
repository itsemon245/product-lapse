@extends('layouts.subscriber.app', ['title' => 'Edit Intro'])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'About Us', 'route' => route('edit.intro')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Edit Intro</h2>
            <form action="{{ route('intro.update', $info->id) }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="login_info">

                    <div class="row">
                        <x-attach label="Add Image" name='image' />
                    </div>

                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Title (English)" id="title_en" type="text"
                                placeholder="Enter Title In English" name="title_en" :value="$info->home->title->en" required autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Title (Arabic)" id="title_ar" type="text"
                                placeholder="Enter Title In Arabic" name="title_ar" :value="$info->home->title->ar" required autofocus />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Caption (English)" id="caption_en" type="text"
                                placeholder="Enter Caption In English" name="caption_en" :value="$info->home->caption->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Caption (Arabic)" id="caption_ar" type="text"
                                placeholder="Enter Caption In Arabic" name="caption_ar" :value="$info->home->caption->ar" required
                                autofocus />
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Button Text (English)" id="button_en" type="text"
                                placeholder="Enter Button Text In English" name="button_en" :value="$info->home->button->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Button Text (Arabic)" id="button_ar" type="text"
                                placeholder="Enter Button Text In Arabic" name="button_ar" :value="$info->home->button->ar" required
                                autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Package Caption (English)" id="package_en" type="text"
                                placeholder="Enter Package Caption In English" name="package_en" :value="$info->package->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Package Caption (Arabic)" id="package_ar" type="text"
                                placeholder="Enter Package Caption In Arabic" name="package_ar" :value="$info->package->ar" required
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
