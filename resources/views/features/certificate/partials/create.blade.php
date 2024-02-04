@extends('layouts.subscriber.app', ['title' => @__('feature/certificate.add')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/certificate.add'), 'route' => route('certificate.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/certificate.add')</h2>
            <form action="{{ route('certificate.store') }}" method="POST" >
                @csrf
                <div class="row">
                    <input type="text" value="{{ auth()->id() }}" name="achieved_id" class="d-none">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="name" value="{{ __('feature/certificate.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/certificate.label.name') }}" name="name" :value="old('name')"  autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="company" value="{{ @__('feature/certificate.label.company') }}" />
                        <x-input id="company" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/certificate.placeholder.company') }}" name="company" :value="old('company_name')"  autofocus />
                    </div>
                </div>
                <div class="d-flex align-items-center text-center">
                    <x-button type="submit">
                        @__('feature/certificate.submit')
                    </x-button>
                </form>
                </div>
           
        </x-slot:from>
    </x-feature.create>
@endsection
