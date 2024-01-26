<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
{{-- Include Haed part and CSS Link --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title }}</title>

   @include('layouts.global.styles')
</head>

<body class="relative overflow-x-hidden">
    {{-- Preloader --}}
    @include('layouts.frontend.preloader')
    <div class="" id="tolink-1">
        <div class="top-link"><a href="#tolink-1"><i class="ti-angle-up"></i></a></div>

        @include('layouts.frontend.header')

        <div class="flex bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
            @yield('sidebar')
            <div class="flex flex-col flex-1 w-full">
                @yield('header')
                {{-- This is main content --}}
                <main>
                    @yield('main')
                </main>
                {{-- Include Footer Section --}}
            </div>
        </div>
    </div>
    @include('layouts.frontend.footer')
    {{-- Include Script --}}
    @include('layouts.frontend.script')
    @stack('scripts')
</body>

</html>
