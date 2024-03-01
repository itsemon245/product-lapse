@extends('layouts.frontend.app')


@section('main')
    <div class="pt-[160px] pb-[60px]">
        {!! $page->body->{app()->getLocale()} !!}
    </div>
@endsection
