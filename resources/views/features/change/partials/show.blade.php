@extends('layouts.subscriber.app', ['title' => @__('feature/change.show')])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/change.show'), 'route' => route('change.show', base64_encode($change->id))]]" />
        </x-slot:breadcrumb>

        <x-slot:details>
            <div class="col-lg-8 blog_sidebar_left">
                <div class="blog_single mb_50">
                    <div class="row">
                        <h5 class="f_size_20 f_500 col-md-12">{{ $change->title }}</h5>
                        <div class="entry_post_info col-md-12">
                            {{ \Carbon\Carbon::parse($change->required_completion_date)->format('l, j F Y') }}
                        </div>
                        <div class="col-lg-6 col-md-6"">
                            <h6 class="title2">@__('feature/change.priority')</h6>
                            <p class="f_400 mb-30 text-font">{{ $change->priority }}</p>
                        </div>
                        <div class="col-lg-6 col-md-6"">
                            <h6 class="title2">@__('feature/change.classification')</h6>
                            <p class="f_400 mb-30 text-font">Web design</p>
                        </div>
                        <div class="col-md-12">
                            <h6 class="title2">@__('feature/change.details')</h6>
                            <p class="f_400 mb-30 text-font">
                                {{ $change->details }}
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
                            <img class="rounded-circle" src="{{ $user->image->url ?? asset('img/profile1.png')}}" alt="">
                            <div class="media-body">
                                <h5 class=" t_color3 f_size_18 f_500">{{ $user->name }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <span class="button-1 btn-bg-1">@__('feature/change.working')</span>
                            </div>
                            <div class="col-6">
                                <a href="#" class="button-1 btn-bg-2"><i class="ti-reload"></i>@__('feature/change.update')</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </x-slot:profile>
        <x-comments :model="$change" :comments="$change->comments" />
    </x-feature.show>
@endsection
