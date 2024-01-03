<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
{{-- Include Haed part and CSS Link --}}
@include('layouts.head')

<body>
    {{-- Preloader --}}
    @include('layouts.preloader')
    <div class="body_wrapper" id="tolink-1">
        <div class="top-link"><a href="#tolink-1"><i class="ti-angle-up"></i></a></div>


        {{-- Asidebar --}}


        {{-- This is main content --}}
        @yield('main')

        {{-- Include Footer Section --}}
        @include('layouts.footer')
    </div>
    {{-- Include Script --}}
    @include('layouts.script')
</body>

</html>
