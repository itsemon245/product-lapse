@extends('layouts.admin.app', ['title' => @__('message.show')])
@section('main')
    <x-feature.show>
        <x-slot:details>
            <div class="col-lg-8 blog_sidebar_left">
                <div class="blog_single mb_50">
                    <div class="">
                        <h5 class="f_size_20 f_500">{{ $contactMessage->name }}</h5>
                        <div class="entry_post_info">
                            {{ \Carbon\Carbon::parse($contactMessage->created_at)->format('l, j F Y') }}
                        </div>

                        <h6 class="title2">@__('message.email')</h6>
                        <p class="f_400 mb-30 text-font">{{ $contactMessage->email }}</p>

                        <h6 class="title2">@__('message.phone')</h6>
                        <p class="f_400 mb-30 text-font">{{ $contactMessage->phone }}</p>

                        <h6 class="title2">@__('message.body')</h6>
                        <p class="f_400 mb-30 text-font">
                            {{ $contactMessage->body }}
                        </p>
                    </div>
                </div>
            </div>
        </x-slot:details>

    </x-feature.show>
@endsection
