@extends('layouts.frontend.app')

@section('main')
    <section class="breadcrumb_area">
        <div class="container d-flex">
            <div class="breadcrumb_content text-center ml-auto">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Notifications</li>
                </ul>
            </div>

        </div>
    </section>
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="sign_info">
                <div class="login_info">
                    <h2 class=" f_600 f_size_24 t_color3 mb_40">Notifications</h2>
                    <ul class="notify-list">
                        @forelse ($notifications as $notification)
                            @php
                                $user = \App\Models\User::find($notification->data['initiator_id']);
                            @endphp
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <div class="feedback_item">
                                        <div class="feed_back_author">
                                            <div class="media">
                                                <div class="img">
                                                    <img src="img/profile1.png" alt="">
                                                </div>
                                                <div class="media-body">
                                                    <h5 class="f_500"><span class="font-bold">{{ $user->name }} </span>
                                                        {{ $notification->data['message'] }} </h5>
                                                    <h6 class="f_400">{{ $notification->created_at->diffForHumans() }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </li>
                        @empty
                            <li class="nav-item">
                                <img style="opacity: .5;" src="{{ asset('img/not-found.png') }}" alt="">
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
