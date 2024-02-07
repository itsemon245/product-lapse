@extends('layouts.subscriber.app', ['title' => 'About Us'])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'About Us', 'route' => route('edit.about_us')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">Edit About Us</h2>
            <form action="{{ route('about_us.update', $info->id) }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="login_info">

                    <div class="row">
                        <x-attach label="Add Image" name='image' />
                    </div>
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Caption (English)" id="caption_en" type="text"
                                placeholder="Enter Caption In English" name="caption_en" :value="$info->about_us->caption->en" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="Caption (Arabic)" id="caption_ar" type="text"
                                placeholder="Enter Caption In Arabic" name="caption_ar" :value="$info->about_us->caption->ar" required
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
