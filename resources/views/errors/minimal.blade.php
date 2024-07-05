@extends('layouts.frontend.app', ['preheader' => 'off'])

@section('main')
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
@endsection
