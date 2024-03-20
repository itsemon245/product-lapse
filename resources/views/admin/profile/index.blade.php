
@extends('layouts.admin.app', ['title' => @__('profile.profile.info')])
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
                        <div class="details_img" >
                            <img class="rounded-circle" style="height: 20rem; width:20rem;" src="{{ $user->image->url ?? asset('img/avatar-1577909_1280.webp') }}" alt="">
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-9">
                        <div class="details_info details_info2">
                            <h2>{{ $user->name }}</h2>
                            <ul class="list-unstyled profile-details">
                                <li><img src="{{ asset('img/check.png') }}">{{ $user->position }}</li>
                                <li><span>@__('profile.profile.free')</span></li>
                                <li><a href="#"><img src="{{ asset('img/crown.png') }}">@__('profile.profile.upgrade')</a></li>
                            </ul>
                            <ul class="list-unstyled">
                                <li><span>@__('profile.profile.email') :</span>{{ $user->email }}</li>
                                <li><span>@__('profile.profile.phone') :</span> <span class="profile-num">{{ $user->phone }}</span></li>
                                <li><span>@__('profile.profile.employer') :</span> The ministry of investment</li>
                            </ul>
                            <div class="btn_info d-flex">
                                <x-button type="link" href="{{ route('admin.profile.edit') }}" class="btn_hover agency_banner_btn btn-bg">@__('profile.profile.edit')</x-button>
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


