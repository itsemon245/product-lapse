@extends('layouts.admin.app', ['title' => 'User Details'])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[
                ['label' => 'User Management', 'route' => route('users.index')],
                ['label' => 'User Details', 'route' => ''],
            ]" />
        </x-slot:breadcrumb>
        <x-slot:details>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 blog_sidebar_left">
                        <div class="blog_single mb_50">
                            <div class="row">
                                <h5 class="f_size_20 f_500 col-md-12">{{ $user->name }}
                                    <div class="entry_post_info col-md-12">
                                        {{ \Carbon\Carbon::parse($user->date)->format('l, j F Y') }}
                                    </div>
                            </div>
                            @php
                                $activePlan = $user->activePlan()->first();
                            @endphp
                            @if ($activePlan)
                                <div
                                    class="bg-emerald-200 text-blue-500 font-bold px-2 py-1 rounded-full text-sm inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M16.403 12.652a3 3 0 0 0 0-5.304a3 3 0 0 0-3.75-3.751a3 3 0 0 0-5.305 0a3 3 0 0 0-3.751 3.75a3 3 0 0 0 0 5.305a3 3 0 0 0 3.75 3.751a3 3 0 0 0 5.305 0a3 3 0 0 0 3.751-3.75m-2.546-4.46a.75.75 0 0 0-1.214-.883L9.16 12.1l-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089z"
                                            clip-rule="evenodd" />
                                    </svg>
                                    {{ $activePlan->name->{app()->getLocale()} }}
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 row">
                        <div class="col-md-6">
                            <h6 class="title2">First Name:</h6>
                            <p class="f_400 mb-30 text-font">{{ ucfirst($user->first_name) }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="title2">Last Name:</h6>
                            <p class="f_400 mb-30 text-font">{{ ucfirst($user->last_name) }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="title2">Phone Number:</h6>
                            <p class="f_400 mb-30 text-font">{{ ucfirst($user->phone) }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="title2">Status:</h6>
                            @if ($user->type == null)
                                <p class="f_400 mb-30 text-font text-danger">Not verified</p>
                            @else
                                <p
                                    class="f_400 mb-30 text-font {{ $user->banned_at == null ? 'text-success' : 'text-danger' }} ">
                                    {{ $user->banned_at == null ? 'Active' : 'Ban' }}</p>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h6 class="title2">Email:</h6>
                            <p class="f_400 mb-30 text-font">{{ ucfirst($user->email) }}</p>
                        </div>
                    </div>
                    <div class="col-md-6 border border-primary">
                        <div class="row">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <img class="h-auto w-auto" src="{{ $user->image->url ?? asset('img/p6.png') }}"
                                    alt="">
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                </div>
            </div>
        </x-slot:details>
    </x-feature.show>
@endsection
