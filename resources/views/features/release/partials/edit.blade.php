@extends('layouts.feature.index', ['title' => @__('feature/release.edit')])
@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/release.edit'), 'route' => route('release.edit', $release)]]" />
        </x-slot:breadcrumb>
        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/release.edit')</h2>
            <form action="{{ route('release.update', $release) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-input-label for="name" value="{{ __('feature/release.label.name') }}" />
                        <x-input id="name" value="{{ $release->name }}" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/release.placeholder.name') }}" name="name" :value="old('name')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="version" value="{{ __('feature/release.label.version') }}" />
                        <x-input id="version" value="{{ $release->version }}" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/release.placeholder.version') }}" name="version" :value="old('version')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="release_date" value="{{ __('feature/release.label.date') }}" />
                        <x-input id="release_date" value="{{ $release->release_date }}" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/release.placeholder.date') }}" name="release_date" :value="old('release_date')" required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea value="{{ $release->description }}" label="{{ __('feature/release.label.details') }}" name="description" placeholder="{{ __('feature/release.label.details') }}" required autfocus />
                        <x-input-error :messages="$errors->get('details')" class="mt-2" />
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <x-button type="submit">
                        @__('feature/release.submit')
                    </x-button>
                </div>
            </form>
        </x-slot:from>
    </x-feature.edit>
@endsection
