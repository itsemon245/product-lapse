<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : '' }}">
{{-- Include Haed part and CSS Link --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
    @include('layouts.global.styles')
</head>

<body class="relative overflow-x-hidden min-h-screen" x-data>
    {{-- Preloader --}}
    {{-- @include('layouts.frontend.preloader') --}}
    <div class="" id="tolink-1 mb-auto">
        <div class="top-link"><a href="#tolink-1"><i class="ti-angle-up"></i></a></div>

        @include('layouts.frontend.header')

        <div class="flex gap-8 flex-col w-max mx-auto h-screen items-center pt-8 justify-center sm:pt-0">
            <div class="text-[72px] font-black text-red-500 tracking-wider">
                @yield('code')
            </div>

            <div class="text-center text-lg font-bold text-red-500 uppercase tracking-wide">
                @yield('message')
            </div>
            <a href="/" class="btn_hover agency_banner_btn wow fadeInLeft btn-bg" data-wow-delay="0.5s"
                style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInBottom;">
                Back to Homepage</a>
        </div>
    </div>
    @include('layouts.frontend.footer')
    {{-- Include Script --}}
    @include('layouts.frontend.script')
</body>

</html>
