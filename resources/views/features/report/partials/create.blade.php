@extends('layouts.subscriber.app', ['title' => @__('feature/report.add')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/report.add'), 'route' => route('report.create')]]" />
        </x-slot:breadcrumb>

        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/report.add')</h2>
            <form action="{{ route('report.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="name" value="{{ __('feature/report.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/report.placeholder.name') }}" name="name" :value="old('name')"
                            autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/report.label.type') }}" id="type"
                            placeholder="Choose one" name="type" autofocus>
                            @forelse ($types as $type)
                                <option value="{{ $type->value->{app()->getLocale()} }}">
                                    {{ $type->value->{app()->getLocale()} }}
                                </option>
                            @empty
                                <option disabled>No type available</option>
                            @endforelse
                        </x-select-input>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input label="{{ __('feature/report.label.date') }}" id="report_date" class="block mt-1 w-full"
                            type="date" name="report_date" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach label="{{ __('feature/report.label.upload') }}" name='file' />
                        <x-input-error :messages="$errors->get('file')" class="mt-2" />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-textarea label="{{ __('feature/report.label.description') }}" rows="5" cols="10"
                            name="description" />
                    </div>

                </div>

                <div class="d-flex align-items-center text-center">
                    <x-button type="submit">
                        @__('feature/report.submit')
                    </x-button>
            </form>
            <x-btn-secondary name="{{ __('feature/report.cancel') }}" />
            </div>

        </x-slot:from>
    </x-feature.create>
@endsection
