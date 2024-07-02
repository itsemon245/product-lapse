@extends('layouts.subscriber.app', ['title' => @__('feature/release.add')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[
                ['label' => @__('feature/release.title'), 'route' => route('release.index')],
                ['label' => @__('feature/release.add'), 'route' => route('release.create')],
            ]" />
        </x-slot:breadcrumb>
        <x-slot:from>
            <h2 class=" f_600 f_size_24 t_color3 mb_40">@__('feature/release.add')</h2>
            <form action="{{ route('release.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-input-label for="name" value="{{ __('feature/release.label.name') }}" />
                        <x-input id="name" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/release.placeholder.name') }}" name="name" :value="old('name')"
                            required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="version" value="{{ __('feature/release.label.version') }}" />
                        <x-input id="inputField" class="block mt-1 w-full" type="text"
                            placeholder="{{ __('feature/release.placeholder.version') }}" name="version" :value="old('version') ?? 0"
                            required autofocus />
                        <div class="input-group-append">
                            <span class="btn btn-success" id="incrementButton">+</span>
                            <span class="btn btn-warning" style="margin-left: 1rem;" id="decrimentButton">-</span>
                        </div>
                    </div>

                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-input-label for="release_date" value="{{ __('feature/release.label.date') }}" />
                        <x-input id="release_date" class="block mt-1 w-full" type="date"
                            placeholder="{{ __('feature/release.placeholder.date') }}" name="release_date" :value="old('release_date')"
                            required autofocus />
                    </div>
                    <div class="form-group text_box col-lg-12 col-md-6">
                        <x-textarea label="{{ __('feature/release.label.details') }}" name="description"
                            placeholder="{{ __('feature/release.label.details') }}" required autfocus>
                            {!! old('description') !!} </x-textarea>
                    </div>
                </div>
                <div class="d-flex align-items-center text-center">
                    <button type="submit"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">{{ __('feature/release.submit') }}</button>
                    <a href="{{ route('release.index') }}"
                        class="btn_hover agency_banner_btn btn-bg btn-bg-grey">@__('feature/release.cancel')</a>
                </div>
            </form>
        </x-slot:from>

    </x-feature.create>
@endsection
@push('customJs')
    <script>
        var inputValue = document.getElementById("inputField").value;
        var incrementBTN = document.getElementById("incrementButton")
        var decrimentBTN = document.getElementById("decrimentButton")
        incrementBTN.addEventListener("click", function() {
            if (inputValue => 1) {
                inputValue++;
                document.getElementById("inputField").value = inputValue;
                decrimentBTN.style.display = "";
            }
        });

        decrimentBTN.addEventListener("click", function() {
            if (inputValue > 0) {
                inputValue--;
                document.getElementById("inputField").value = inputValue;
            } else if (inputValue == 0) {
                decrimentBTN.style.display = "none";
            }

        });
    </script>
@endpush
