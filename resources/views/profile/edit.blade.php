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
        <section>
            <header>
                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                   Update Address
                </h2>
        
                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                    Lorem ipsum dolor sit amet consectetur adipisicing.
                </p>
            </header>
        
            <form action="{{ route('address.update') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="form-group mb-2 text_box col-md-6">
                        <div class="flex justify-between">
                            <x-input-label class="flex-shrink" for="name" value="Name" />
                        </div>
                        <x-input id="name" class="block mt-1 w-full" type="text" placeholder="Name"
                            name="name" :value="old('name')" autofocus />
                    </div>
                    <div class="form-group text_box col-lg-6 col-md-6">
                        <x-select-input label="Type" id="type"
                            placeholder="Choose one" name="type" required autofocus>
                            <option value="billing">Billing</option>
                            <option value="shipping">Shipping</option>
                        </x-select-input>
                    </div>
                    <div class="form-group mb-2 text_box col-md-6">
                        <div class="flex justify-between">
                            <x-input-label class="flex-shrink" for="email" value="Email" />
                        </div>
                        <x-input id="email" class="block mt-1 w-full" type="text" placeholder="email"
                            name="email" :value="old('email')" autofocus />
                    </div>
                    <div class="form-group mb-2 text_box col-md-6">
                        <div class="flex justify-between">
                            <x-input-label class="flex-shrink" for="phone" value="Phone" />
                        </div>
                        <x-input id="phone" class="block mt-1 w-full" type="text" placeholder="phone"
                            name="phone" :value="old('phone')" autofocus />
                    </div>
                    <div class="form-group mb-2 text_box col-md-6">
                        <div class="flex justify-between">
                            <x-input-label class="flex-shrink" for="city" value="City" />
                        </div>
                        <x-input id="city" class="block mt-1 w-full" type="text" placeholder="city"
                            name="city" :value="old('city')" autofocus />
                    </div>
                    <div class="form-group mb-2 text_box col-md-6">
                        <div class="flex justify-between">
                            <x-input-label class="flex-shrink" for="street" value="Street" />
                        </div>
                        <x-input id="street" class="block mt-1 w-full" type="text" placeholder="street"
                            name="street" :value="old('street')" autofocus />
                    </div>
                    <div class="form-group mb-2 text_box col-md-6">
                        <div class="flex justify-between">
                            <x-input-label class="flex-shrink" for="country" value="Country" />
                        </div>
                        <x-input id="country" class="block mt-1 w-full" type="text" placeholder="country"
                            name="country" :value="old('country')" autofocus />
                    </div>
                    <div class="form-group mb-2 text_box col-md-6">
                        <div class="flex justify-between">
                            <x-input-label class="flex-shrink" for="zip" value="ZIP" />
                        </div>
                        <x-input id="zip" class="block mt-1 w-full" type="text" placeholder="zip"
                            name="zip" :value="old('zip')" autofocus />
                    </div>
                    <div class="form-group mb-2 text_box col-md-12">
                        <x-textarea placeholder="State" rows="5" cols="10" name="state" label="State"> 
                        </x-textarea>
                    </div>
                    <div class="form-group mb-2 text_box col-md-6">
                        <div class="flex justify-between">
                            <x-input-label class="flex-shrink" for="IP" value="IP" />
                        </div>
                        <x-input id="IP" class="block mt-1 w-full" type="text" placeholder="enter ip address"
                            name="ip" :value="old('ip')" autofocus />
                    </div>
                    <div class="form-group mb-2 text_box col-md-6 ">
                        <div class="flex items-center justify-start gap-[1rem] px-[1rem] h-full">
                            <div class="form-group text_box mb-0 mr-2">
                                <x-checkbox-input class="" name="us_as_shiping" checked label="Set as Popular" />
                            </div>
                        </div>
                    </div>
                </div>
                <x-primary-button>{{ __('profile.password.save') }}</x-primary-button>
            </form>
        </section>
    </x-slot:from>
</x-feature.create>
@push('customJs')
    {{-- Photo Preview for uploads --}}
    <script>
        $(document).ready(function() {

            const input = $("#imagefile")
            input.on('change', e => {
                const image = document.querySelector('#liveImage')
                const url = URL.createObjectURL(e.target.files[0])
                image.src = url
            })
        });
    </script>
    {{-- Photo Preview for uploads --}}
@endpush

