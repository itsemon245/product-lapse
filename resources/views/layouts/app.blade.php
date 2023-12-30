<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://unpkg.com/htmx.org@1.9.6" integrity="sha384-FhXw7b6AlE/jyjlZH5iHa/tTe9EpJ1Y55RjcgPbjeWMskSxZt1v9qkxLJWNJaGni" crossorigin="anonymous"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

            <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
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
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

           <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/propper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendors/wow/wow.min.js') }}"></script>
    <script src="{{ asset('vendors/sckroller/jquery.parallax-scroll.js') }}"></script>
    <script src="{{ asset('vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendors/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('vendors/isotope/isotope-min.js') }}"></script>
    <script src="{{ asset('vendors/magnify-pop/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('vendors/nice-select/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('vendors/scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
