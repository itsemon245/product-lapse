@extends('layouts.subscriber.app', ['title' => @__('profile.profile.info')])
@section('main')
    <x-feature.create>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('profile.profile.info'), 'route' => '']]" />
        </x-slot:breadcrumb>
        <x-slot:from>
            {{-- {{ dd($user) }} --}}
            <section class="sign_in_area bg_color sec_pad">
                <div class="container">
                    <div class="study_details">
                        <div class="row">
                            <div class="col-md-5 col-sm-3">
                                <div class="details_img">
                                    <img class="rounded-circle border border-primary" style="height: 20rem; width:20rem;"
                                        src="{{ $user->image->url ?? avatar($user->name) }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-7 col-sm-9">
                                <div class="details_info details_info2">
                                    <div class="flex gap-2 items-center mb-2">
                                        <h2 class="m-0">{{ $user->name }}</h2>
                                        @if ($user->email_verified_at != null)
                                            <div
                                                class="bg-emerald-200 text-green-500 font-bold px-2 py-1 rounded-full text-sm flex items-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 20 20">
                                                    <path fill="currentColor" fill-rule="evenodd"
                                                        d="M16.403 12.652a3 3 0 0 0 0-5.304a3 3 0 0 0-3.75-3.751a3 3 0 0 0-5.305 0a3 3 0 0 0-3.751 3.75a3 3 0 0 0 0 5.305a3 3 0 0 0 3.75 3.751a3 3 0 0 0 5.305 0a3 3 0 0 0 3.751-3.75m-2.546-4.46a.75.75 0 0 0-1.214-.883L9.16 12.1l-1.88-1.88a.75.75 0 1 0-1.06 1.061l2.5 2.5a.75.75 0 0 0 1.137-.089z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                                @__('Email Verified')
                                            </div>
                                        @endif
                                    </div>

                                    <ul class="list-unstyled profile-details">
                                        @if ($user->getRole() != null)
                                            <li class="!flex items-center gap-2">
                                                <img src="{{ asset('img/check.png') }}" />
                                                <div class="capitalize">{{ $user->getRole()->name }}</div>
                                            </li>
                                        @endif
                                                                            @if($user->type == 'subscriber')
                                        @if ($user->activePlan()->first() != null)
                                            <li><span>{{ $user->activePlanName() }}</span></li>
                                            <li><a href="{{ route('package.upgrade') }}"
                                                    class="flex items-center gap-2"><img
                                                        src="{{ asset('img/crown.png') }}">@__('profile.profile.upgrade')</a>
                                        </li>
                                        @endif
                                    @endif
                                    </ul>
                                    <ul class="list-unstyled">
                                        <li><span>@__('profile.profile.email') :</span> {{ $user->email }}</li>
                                        <li><span>@__('profile.profile.phone') :</span> <span
                                                class="profile-num">{{ $user->phone }}</span></li>
                                        @if ($user->type == 'member')
                                            <li><span>@__('profile.profile.employer') :</span> {{ $user->owner?->name }}</li>
                                        @endif
                                    </ul>
                                    <div class="btn_info d-flex gap-2 items-center">
                                        <x-button type="link" href="{{ route('profile.edit') }}"
                                            class="btn_hover agency_banner_btn btn-bg">@__('profile.profile.edit')</x-button>
                                        @if (auth()->user()?->type != 'admin' || auth()->user()?->type != 'member')
                                            <x-button type="link" href="{{ route('address.edit') }}"
                                                class="btn_hover agency_banner_btn btn-bg">@__('Edit Billing Address')</x-button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </x-slot:from>
    </x-feature.create>
@endsection
