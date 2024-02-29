@extends('layouts.frontend.app', ['title' => @__('profile.profile.info')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('profile.profile.info'), 'route' => route('product.info')]]" />
        </x-slot:breadcrumb>
        <x-slot:from>
            <div class="col-lg-12 mb-2">
                @include('profile.partials.update-profile-information-form')
            </div>
            <hr style="border-top: 2px solid black;">
            <div class="max-w-xl col-lg-12">
                @include('profile.partials.update-password-form')
            </div>
        </x-slot:from>
    </x-feature.create>
    @push('customJs')
        {{-- Photo Preview for uploads --}}
        <script>
            $(document).ready(function() {

                const input required = $("#imagefile")
                input.on('change', e => {
                    const image = document.querySelector('#liveImage')
                    const url = URL.createObjectURL(e.target.files[0])
                    image.src = url
                })
            });
        </script>
        {{-- Photo Preview for uploads --}}
    @endpush
