@extends('layouts.subscriber.app', ['title' => @__('feature/idea.details')])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/idea.details'), 'route' => route('idea.show', base64_encode($idea->id))]]" />
        </x-slot:breadcrumb>


        <x-slot:details>
            <div class="container mb_20">
                <ul class="step d-flex flex-nowrap">
                    @foreach ($stages as $stage)
                        <li class="step-item {{ $idea->stage == $stage->value ? 'active' : '' }}">
                            <a href="#!" class="">@lang('Idea ' . $stage->value)</a>
                        </li>
                    @endforeach

                </ul>
            </div>
            <div class="col-lg-8 blog_sidebar_left">
                <div class="blog_single mb_50">
                    <div class="">
                        <h5 class="f_size_20 f_500">{{ $idea->name }}</h5>
                        <div class="entry_post_info">
                            {{ \Carbon\Carbon::parse($idea->date)->format('l, j F Y') }}
                        </div>
                        <h6 class="title2">@__('feature/idea.title-details')</h6>
                        <p class="f_400 mb-30 text-font">
                            {{ $idea->details }}
                        </p>
                        <h6 class="title2">@__('feature/idea.placeholder.requirements')</h6>
                        <ul class="list-unstyled f_400 mb-30 text-font list-details">
                            {!! $idea->requirements !!}
                        </ul>
                    </div>
                </div>

            </div>
        </x-slot:details>
        <x-slot:profile>
            <div class="col-lg-4">
                <div class="blog-sidebar box-sidebar">
                    <div class="widget sidebar_widget widget_recent_post mt_60">
                        <div class="media post_author mt_60">
                            <img class="rounded-circle" src="img/profile1.png" alt="">
                            <div class="media-body">
                                <h5 class=" t_color3 f_size_18 f_500">Ahmed Mahmoud</h5>
                            </div>
                        </div>
                        <h6 class="title2 the-priority">Priority : <span>{{ $idea->priority }}</span></h6>
                        <div class="row">
                            <div class="col-12">
                                <a href="#" class="button-1 btn-bg-2"><i class="ti-reload"></i>@__('feature/idea.update')</a>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('change.create', ['idea' => $idea->id]) }}"
                                    class="button-1">@__('feature/idea.change-request')</a>
                            </div>
                            <div class="col-12">
                                <a href="{{ route('task.create', ['idea' => $idea->id]) }}" class="button-1"
                                    style="background: #6c84ee">@__('feature/idea.task')</a>
                            </div>
                        </div>
                        <h6 class="title2 the-priority">Idea owner : <span>Ahmed Shalaby</span></h6>
                    </div>

                </div>
                <div class="d-flex justify-content-between align-items-center text-center mt_15 mb_20">
                    <a href="{{ route('idea.edit', $idea) }}" class="icon-square" title="Edit">
                        <i class="ti-pencil"></i>
                    </a>
                    <a href="#" class="icon-square icon-square2" title="share"><i class="ti-sharethis"></i></a>
                    <a href="#" class="icon-square icon-square3" title="save"><img src="img/pdf2.png"
                            height="20"></a>
                </div>

            </div>
        </x-slot:profile>
        <x-comments :model="$idea" :comments="$idea->comments" />
    </x-feature.show>
@endsection
