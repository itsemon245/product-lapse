@extends('layouts.frontend.app')


@section('main')
    <div class="pt-[120px]">
        {!! $page->body->{app()->getLocale()} !!}
    </div>
@endsection
