@extends('layouts.subscriber.app', ['title' => @__('feature/support.show')])
@section('main')
<x-feature.show>
    <x-slot:breadcrumb>
        <x-breadcrumb :list="[['label' => @__('feature/support.show'), 'route' => route('support.show', $support)]]" />
    </x-slot:breadcrumb>
    <x-slot:details>
        <div class="col-lg-8 blog_sidebar_left">
            <div class="blog_single mb_50">
                <div class="row">
                    <h5 class="f_size_20 f_500 col-md-12">{{ $support->name }}</h5>
                    <div class="entry_post_info col-md-12">
                        {{ \Carbon\Carbon::parse($support->created_at)->format('l, j F Y') }}
                    </div>
                    <div class="col-md-6">
                        <h6 class="title2">@__('feature/support.priority')</h6>
                        <p class="f_400 mb-30 text-font">@lang('support.' . $support->priority)</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="title2">@__('feature/support.classification')</h6>
                        <p class="f_400 mb-30 text-font">@lang('support.' . $support->classification)</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="title2">@__('feature/support.end-date')</h6>
                        <p class="f_400 mb-30 text-font">
                            {{ \Carbon\Carbon::parse($support->completion_date)->format('l, j F Y') }}</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="title2">@__('feature/support.realy-date')</h6>
                        <p class="f_400 mb-30 text-font">Sunday, 16 June 2023</p>
                    </div>
                    <div class="col-md-12">
                        <h6 class="title2">@__('feature/support.details')</h6>
                        <p class="f_400 mb-30 text-font">
                            {{ $support->description }}
                        </p>
                    </div>

                </div>
            </div>

        </div>
    </x-slot:details>
    <x-slot:profile>
        <div class="col-lg-4">
            <div class="blog-sidebar box-sidebar">
                <div class="widget sidebar_widget widget_recent_post mt_60">
                    <div class="media post_author mt_60">
                        <img class="rounded-circle" src="{{ $user->image->url ?? asset('img/profile1.png') }}" alt="">
                        <div class="media-body">
                            <h5 class=" t_color3 f_size_18 f_500">{{ $user->name }}</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <button type="button" class="button-1 btn-bg-1" data-toggle="modal" data-target="#myModal1">@lang('support.' . $support->status)</button>
                        </div>
                        <div class="col-6">
                            <a href="#" class="button-1 btn-bg-2"><i class="ti-reload"></i>@__('feature/support.update')</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-slot:profile>
    <x-comments :model="$support" :comments="$support->comments" />
</x-feature.show>
<x-update-modal :options="$statuses" />
@endsection
