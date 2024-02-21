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

        <header class="header_area header_area_inner">
            <nav class="navbar navbar-expand-lg menu_one menu_four">
                <div class="container custom_container p0">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('img/logo-white.png') }}" class="logo1" srcset="{{ asset('img/logo-white.png') }} 2x"
                            alt="logo">
                        <img src="{{ asset('img/logo.png') }}" class="logo2" srcset="{{ asset('img/logo.png') }} 2x"
                            alt="logo">
                    </a>
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="menu_toggle">
                            <span class="hamburger">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                            <span class="hamburger-cross">
                                <span></span>
                                <span></span>
                            </span>
                        </span>
                    </button>
                    <ul class="navbar-nav menu hidden-sm hidden-xs navbar-nav-signin gap-4 items-center">
                        <li class="nav-item dropdown submenu m-0">
                            @include('layouts.frontend.locale-switcher')
                        </li>
                        @auth
                            <li class="nav-item dropdown submenu m-0">
                                <a class="nav-link dropdown-toggle btn-bg btn-icon" href="{{ route('dashboard') }}" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @php
                                        $currentUser = auth()->user()->with('image')->first();
                                    @endphp
                                    {{-- <img src="{{ $currentUser->image->url ?? asset('img/about.png') }}" alt=""> --}}
                                    <i class="ti-user"></i>
                                </a>
                                @include('layouts.global.profile-menu')
                            </li>
                            @include('layouts.global.notification-list')
                        @else
                            <li class="nav-item dropdown submenu m-0">
                                <a class="btn_get btn_hover hidden-sm hidden-xs btn-bg" href="{{ route('login') }}">login</a>
                            <li>
                            @endauth
        
                    </ul>
                </div>
            </nav>
        </header>

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
