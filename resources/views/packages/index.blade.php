@extends('layouts.frontend.app')


@section('main')
    <x-breadcrumb :list="[
        [
            'label' => __('Packages'),
            'route' => route('package.compare'),
        ],
    ]">

    </x-breadcrumb>
    @include('layouts.frontend.pricing-area', ['packages' => $packages])
@endsection
