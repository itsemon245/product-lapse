@extends('layouts.frontend.app', ['title' => @__('Forgot Password')])

@section('main')
    <x-breadcrumb :list="[
        [
            'label' => __('Forgot Password'),
            'route' => route('package.compare'),
        ],
    ]">

    </x-breadcrumb>
    <section class="sign_in_area bg_color sec_pad" style="padding-top: 20px">
        <div class="container">
            <div class="bg-yellow-200 text-yellow-500 p-4 mb-4 font-bold">
                {{ __('Forgot your password? No problem. Enter your email to get the reset password link.') }}
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-input id="email" class="block mt-1 w-full" placeholder="{{ __('Email') }}" type="email" name="email" :value="old('email')" required
                        autofocus />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="flex items-center mt-4">
                    <x-button>
                        {{ __('Email Password Reset Link') }}
                    </x-button>
                </div>
            </form>
        </div>
    </section>
@endsection
