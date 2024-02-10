
@extends('layouts.subscriber.app', ['title' => @__('profile.profile.info')])
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
        <hr style="border-top: 2px solid black;">
        <div class="max-w-xl col-lg-12">
            @include('profile.partials.delete-user-form')
        </div>
        
        {{-- <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>
        
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>
        
                <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div> --}}
    </x-slot:from>
</x-feature.create>
@endsection


