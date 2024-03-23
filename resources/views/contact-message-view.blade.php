@extends('layouts.admin.app', ['title' => @__('Contact massage show')])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('Contact Messages'), 'route' => route('contact.messages')] ,['label' => @__('Massage Details'), 'route' => '']]" />
        </x-slot:breadcrumb>
        <x-slot:details>
            <div class="col-md-12 blog_sidebar_left">
                <div class=" blog_single mb_20">
                    <h5 class="f_size_20 f_500">{{ $contactMessage->name }}</h5>
                    <div class="entry_post_info">
                        {{ \Carbon\Carbon::parse($contactMessage->created_at)->format('l, j F Y') }}
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="title2">@__('Email')</h6>
                            <p class="f_400 mb-30 text-font">{{ $contactMessage->email }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="title2">@__('Phone')</h6>
                            <p class="f_400 mb-30 text-font">{{ $contactMessage->phone }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="title2">@__('Body')</h6>
                            <p class="f_400 mb-30 text-font">
                                {{ $contactMessage->body }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="blog_single mb_50">
                    <form action="{{ route('message.reply.send', $contactMessage) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <x-textarea name="reply" label="{{ __('Reply') }}" placeholder="{{ __('Write somethings....') }}" rows="10" required="required" />
                        </div>
                        <div class="form-group">
                            <x-button type="submit" class="btn btn-primary">@__('Send')</x-button>
                        </div>
                    </form>
                </div>
            </div>

        </x-slot:details>

    </x-feature.show>
@endsection
