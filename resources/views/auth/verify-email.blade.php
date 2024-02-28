@extends('layouts.frontend.app')

@section('main')
    <x-breadcrumb :list="[
        [
            'label' => __('Verify Email'),
            'route' => route('package.compare'),
        ],
    ]">

    </x-breadcrumb>
    <section class="sign_in_area bg_color sec_pad" style="padding-top: 20px">
        <div class="container">
            <div class="bg-yellow-200 text-yellow-500 p-4 mb-4 font-bold">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>
        
            @if (session('status') == 'verification-link-sent')
                <div class="bg-green-300 text-green-500 p-4 mb-4 font-bold">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif
        
            <div class="mt-4 flex items-center justify-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
        
                    <div>
                        <x-button>
                            {{ __('Resend Verification Email') }}
                        </x-button>
                    </div>
                </form>
        
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
        
                    <button type="submit" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
