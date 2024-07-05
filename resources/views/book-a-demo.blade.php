@extends('layouts.frontend.app', ['title' => __('Book a demo')])

@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Book a demo'), 'route' => route('edit.contact.us')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('Book a demo')</h2>
            <form action="{{route('book.demo.store')}}" method="POST" class="login-form sign-in-form" enctype="multipart/form-data">
                @csrf
                <div class="login_info">
                    <div class="row">
                        <div class="form-group text_box col-md-6">
                            <x-input label="{{ __('Full Name') }}" id="full_name" type="text"
                                placeholder="{{ __('Full Name') }}" name="full_name" :value="auth()->user()?->full_name" required autofocus />
                        </div>
                        <div class="form-group text_box col-md-6">
                            <x-input label="{{ __('Official Email') }}" id="official_email" type="email"
                                placeholder="{{ __('Official Email') }}" name="official_email" required autofocus />
                        </div>
                        <div class="form-group text_box col-md-6">
                            <x-input label="{{ __('Mobile Number') }}" id="mobile_number" type="text"
                                placeholder="{{ __('Mobile Number') }}" name="mobile_number" required autofocus />
                        </div>
                        <div class="form-group text_box col-md-6">
                            <x-input label="{{ __('Company / Org. Name') }}" id="company_name" type="text"
                                placeholder="{{ __('Company / Org. Name') }}" name="company_name" required autofocus />
                        </div>
                    </div>
                </div>

                <div class="d-flex align-items-center text-center gap-2">
                    <x-button>@__('Submit')</x-button>
                    <x-button type="link" :href="url()->previous()" color="secondary">{{ __('Cancel') }}</x-button>
                </div>
            </form>

        </x-slot:from>
    </x-feature.edit>
@endsection
