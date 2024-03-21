@extends('layouts.subscriber.app', ['title' => @__('feature/document.edit')])
@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/document.edit'), 'route' => route('document.edit', $document)]]" />
        </x-slot:breadcrumb>
        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/document.edit')</h2>
            <form method="POST" action="{{ route('document.update', $document) }}" enctype="multipart/form-data"
                class="login-form sign-in-form">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-input-label for="name" value="{{ __('feature/document.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/document.placeholder.name') }}" name="name"
                            value="{{ $document->name ?? old('name') }}" required autofocus />
                    </div>

                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="{{ __('feature/document.label.type') }}" id="type"
                            placeholder="Choose one" name="type" required autofocus>
                            @foreach ($type as $category)
                                <option value="{{ $category->value->{app()->getLocale()} }}"
                                    @if ($document->type == $category->value->{app()->getLocale()} || $category->value->{app()->getLocale()} == old('type')) selected @endif>
                                    {{ $category->value->{app()->getLocale()} }}
                                </option>
                            @endforeach
                        </x-select-input>

                    </div>

                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="version" value="{{ __('feature/document.label.version') }}" />
                        <x-input id="version" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/document.placeholder.version') }}" name="version"
                            value="{{ $document->version ?? old('version') }}" required autofocus />
                    </div>

                    <div class="form-group text_box col-lg-12 col-md-12">
                        <x-textarea placeholder="{{ __('feature/document.placeholder.description') }}" rows="5"
                            cols="10" name="description" label="{{ __('feature/document.label.description') }}">
                            {!! $document->description ?? old('description') !!}
                        </x-textarea>
                    </div>

                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="date" value="{{ __('feature/document.label.date') }}" />
                        <x-input id="date" class="block mt-1 w-full" type="date" name="date"
                            value="{{ \Carbon\Carbon::parse($document->date)->format('Y-m-d') ?? old('date') }}" required autofocus />
                    </div>

                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-attach label="{{ __('feature/document.label.attach') }}" name="attach_file" />
                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">
                        @__('feature/document.edit')</button>
                    <a href="{{ route('document.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/document.cancel')</a>
                </div>
            </form>
        </x-slot:from>
    </x-feature.edit>
@endsection
