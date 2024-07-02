@extends('layouts.subscriber.app', ['title' => @__('feature/release.edit')])
@section('main')
    <x-feature.edit>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[
                ['label' => @__('feature/release.title'), 'route' => route('release.index')],
                ['label' => @__('feature/release.edit'), 'route' => route('release.edit', $release)],
            ]" />
        </x-slot:breadcrumb>
        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/release.edit')</h2>
            <form action="{{ route('release.update', $release) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-input-label for="name" value="{{ __('feature/release.label.name') }}" />
                        <x-input id="name" value="{{ $release->name ?? old('name') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/release.placeholder.name') }}" name="name"
                            required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="version" value="{{ __('feature/release.label.version') }}" />
                        <x-input id="inputField" value="{{ $release->version ?? old('version') }}" class="block mt-1 w-full"
                            type="text" placeholder="{{ __('feature/release.placeholder.version') }}" name="version"
                            required autofocus />
                        <div class="input-group-append">
                            <span class="btn btn-success" id="incrementButton">+</span>
                            <span class="btn btn-warning" style="margin-left: 1rem;" id="decrimentButton">-</span>
                        </div>
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="release_date" value="{{ __('feature/release.label.date') }}" />
                        <x-input id="release_date"
                            value="{{ \Carbon\Carbon::parse($release->release_date)->format('Y-m-d') ?? old('release_date') }}"
                            class="block mt-1 w-full" type="date"
                            placeholder="{{ __('feature/release.placeholder.date') }}" name="release_date" required
                            autofocus />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea value="{{ $release->description }}" label="{{ __('feature/release.label.details') }}"
                            name="description" placeholder="{{ __('feature/release.label.details') }}" required
                            autfocus>{{ $release->description ?? old('description') }}</x-textarea>

                    </div>
                </div>

                <div class="d-flex align-items-center text-center">
                    <x-button type="submit">
                        @__('feature/release.edit')
                    </x-button>

                    <a href="{{ route('release.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/release.cancel')</a>
                </div>
            </form>
        </x-slot:from>
    </x-feature.edit>
@endsection
@push('customJs')
    <script>
        var incrementBTN = document.getElementById("incrementButton")
            .addEventListener("click", function() {
                var inputValue = document.getElementById("inputField").value;
                if (inputValue => 1) {
                    inputValue++;
                    document.getElementById("inputField").value = inputValue;

                }
            });
        var decrimentBTN = document.getElementById("decrimentButton")
            .addEventListener("click", function() {
                var inputValue = document.getElementById("inputField").value;
                if (inputValue > 0) {
                    inputValue--;
                    document.getElementById("inputField").value = inputValue;
                    decrimentBTN.style.display = "none";
                }

            });
    </script>
@endpush
