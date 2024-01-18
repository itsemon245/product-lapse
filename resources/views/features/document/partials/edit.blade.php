@extends('layouts.feature.index', ['title' => 'Edit Docment'])
@section('main')
<x-feature.edit>
    <x-slot:breadcrumb>
        <x-breadcrumb :list="[['label' => 'Edit Document', 'route' => route('document.edit', $document)]]" />
    </x-slot:breadcrumb>
    <x-slot:from>
        <h2 class=" f_600 f_size_24 t_color3 mb_40">@lang('document.edit_document')</h2>
        <form method="POST" action="{{ route('document.update', ['document' => base64_encode($document->id)]) }}"
            enctype="multipart/form-data" class="login-form sign-in-form">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group text_box col-lg-12 col-md-12">
                    <x-input-label for="name" value="{{ __('document.name') }}" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text"
                        placeholder="Enter document name" name="name" value="{{ $document->name }}" required
                        autofocus />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <div class="form-group text_box col-lg-6 col-md-6">
                    <x-select-input label="{{ __('document.type') }}" id="type" placeholder="Choose one"
                        name="type" required autofocus>
                        <option value="pdf" {{ $document->type === 'pdf' ? 'selected' : '' }}>
                            @lang('document.pdf')</option>
                        <option value="zip" {{ $document->type === 'zip' ? 'selected' : '' }}>
                            @lang('document.zip')</option>
                        <option value="rar" {{ $document->type === 'rar' ? 'selected' : '' }}>
                            @lang('document.rar')</option>
                    </x-select-input>
                </div>

                <div class="form-group text_box col-lg-6 col-md-6">
                    <x-input-label for="version" value="{{ __('document.version') }}" />
                    <x-text-input id="version" class="block mt-1 w-full" type="text" placeholder="version"
                        name="version" value="{{ $document->version }}" required autofocus />
                    <x-input-error :messages="$errors->get('version')" class="mt-2" />
                </div>

                <div class="form-group text_box col-lg-12 col-md-12">
                    <x-input-label for="description" value="{{ __('document.description') }}" />
                    <x-textarea id="description" class="block mt-1 w-full" name="description"
                        value="{{ $document->description }}" placeholder="Write details..." required autofocus />
                    <x-input-error :messages="$errors->get('description')" class="mt-2" />
                </div>

                <div class="form-group text_box col-lg-6 col-md-6">
                    <x-input-label for="date" value="{{ __('document.date') }}" />
                    <x-text-input id="date" class="block mt-1 w-full" type="date" name="date"
                        value="{{ \Carbon\Carbon::parse($document->date)->format('Y-m-d') }}" required autofocus />
                    <x-input-error :messages="$errors->get('date')" class="mt-2" />
                </div>

                <div class="form-group text_box col-lg-6 col-md-6">
                    <x-attach label="{{ __('document.attach') }}" name="attach_file" />
                    <x-input-error :messages="$errors->get('attach_file')" class="mt-2" />
                </div>
            </div>

            <div class="d-flex align-items-center text-center">
                <button type="submit"
                    class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@lang('document.edit_document')</button>
                <a href="{{ route('document.index') }}"
                    class="btn_hover agency_banner_btn btn-bg btn-bg-grey">Cancel</a>
            </div>
        </form>
    </x-slot:from>
</x-feature.edit>
@endsection
