@extends('layouts.admin.app', ['title' => 'User Details'])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'User Details', 'route' => route('users.show', $user)]]" />
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
                                <p class="f_400 mb-30 text-font {{ $user->banned_at == null ? 'text-success' : 'text-danger' }} ">{{ $user->banned_at == null ? 'Active' : 'Ban' }}</p>
                            </div> 
                        </div> 
                        <div class="col-md-6 border border-primary">
                            <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <img class="h-auto w-auto" src="{{ $user->image->url ?? asset('img/p6.png') }}" alt="">
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        </div>             
                    </div>
                </div>
        </x-slot:details>
    </x-feature.show>
@endsection

