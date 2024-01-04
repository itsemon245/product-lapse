<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="data()">
{{-- Include Haed part and CSS Link --}}

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('meta')
    {{-- <title>{{ $title }}</title> --}}

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/htmx.org@1.9.6"
        integrity="sha384-FhXw7b6AlE/jyjlZH5iHa/tTe9EpJ1Y55RjcgPbjeWMskSxZt1v9qkxLJWNJaGni" crossorigin="anonymous">
    </script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/bootstrap-selector/css/bootstrap-select.min.css') }}">
    <!--icon font css-->
    <link rel="stylesheet" href="{{ asset('vendors/themify-icon/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/elagent/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/flaticon/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/animation/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/owl-carousel/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/magnify-pop/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/nice-select/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/scroll/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    {{-- Must Needed --}}
    <link rel="stylesheet" href="{{ asset('css/windmil.output.css') }}">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/init-alpine.js') }}"></script>
    @stack('styles')
</head>

<body class="relative overflow-x-hidden">
    {{-- Preloader --}}
    @include('layouts.frontend.preloader')
    <div class="" id="tolink-1">
        <div class="top-link"><a href="#tolink-1"><i class="ti-angle-up"></i></a></div>


        <div class="flex bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
            {{-- Desktop Sidebar --}}
            @include('layouts.admin.sidebar-desktop')
            {{-- Desktop Sidebar --}}

            {{-- BackDrop --}}
            <div x-show="isSideMenuOpen" x-transition:enter="transition ease-in-out duration-150"
                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                x-transition:leave="transition ease-in-out duration-150" x-transition:leave-start="opacity-100"
                x-transition:leave-end="opacity-0"
                class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center"
                style="display: none;"></div>
            {{-- BackDrop --}}

            {{-- Mobile Sidebar --}}
            @include('layouts.admin.sidebar-mobile')
            {{-- Mobile Sidebar --}}

            <div class="flex flex-col flex-1 w-full">
                @include('layouts.admin.header')
                @yield('breadcrumb')
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
