@extends('layouts.admin.app', ['title' => __('Edit Contact Us')])

@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Edit Contact Us'), 'route' => route('edit.contact.us')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('Edit Contact Us')</h2>
            <form action="{{ route('contact.us.update', $contact->id) }}" method="POST" class="login-form sign-in-form"
                enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="login_info">

                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.phone') }}" id="phone" type="text"
                                placeholder="{{ __('welcome.phone') }}" name="phone" :value="$contact->phone" required
                                autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.fax') }}" id="fax" type="text"
                                placeholder="{{ __('welcome.fax') }}" name="fax" :value="$contact->fax" required autofocus />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('welcome.email') }}" id="email" type="text"
                                placeholder="{{ __('welcome.email') }}" name="email" :value="$contact->email" required
                                autofocus />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Facebook') }}" id="facebook" type="text"
                                placeholder="{{ __('Facebook') }}" name="facebook" :value="$contact->facebook" />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Twitter') }}" id="twitter" type="text"
                                placeholder="{{ __('Twitter') }}" name="twitter" :value="$contact->twitter" />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Pinterest') }}" id="pinterest" type="text"
                                placeholder="{{ __('Pinterest') }}" name="pinterest" :value="$contact->pinterest" />
                        </div>
                        <div class="form-group text_box col-lg-6 col-md-6">
                            <x-input label="{{ __('Vimeo') }}" id="vimeo" type="text"
                                placeholder="{{ __('Vimeo') }}" name="vimeo" :value="$contact->vimeo" />
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center text-center gap-2">
                    <x-button>@__('Submit')</x-button>
                    <x-button type="link" :href="route('features.index')" color="secondary">{{ __('Cancel') }}</x-button>
                </div>
            </form>

        </x-slot:from>
    </x-feature.edit>
@endsection
