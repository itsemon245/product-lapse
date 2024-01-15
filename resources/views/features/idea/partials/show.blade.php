@extends('layouts.feature.index', ['title' => 'Details OF Idea'])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Idea', 'route' => route('idea.show', base64_encode($idea->id))]]" />
        </x-slot:breadcrumb>

        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Idea', 'route' => route('idea.show', base64_encode($idea->id))]]" />
        </x-slot:breadcrumb>

        <x-slot:details>
            <div class="container mb_20">
                <ul class="step d-flex flex-nowrap">
                    @foreach (['new', 'evaluate', 'discuss', 'final_wording', 'accepted', 'refused', 'deleted'] as $index => $step)
                        <li class="step-item {{ $idea->priority == $step ? 'active' : '' }}">
                            <a href="#!" class="">@lang('idea.' . $step)</a>
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
                        <h6 class="title2">Idea details</h6>
                        <p class="f_400 mb-30 text-font">
                            {{ $idea->details }}
                        </p>
                        <h6 class="title2">Idea requirements</h6>
                        <ul class="list-unstyled f_400 mb-30 text-font list-details">
                            <li><i class="ti-check"></i>It is a long established fact that a reader will be distracted by
                                the readable content of a page.</li>
                            <li><i class="ti-check"></i>It is a long established fact that a reader will be distracted by
                                the readable content of a page.</li>
                            <li><i class="ti-check"></i>It is a long established fact that a reader will be distracted by
                                the readable content of a page.</li>
                            <li><i class="ti-check"></i>It is a long established fact that a reader will be distracted by
                                the readable content of a page.</li>
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
                                <a href="#" class="button-1 btn-bg-2"><i class="ti-reload"></i>Update</a>
                            </div>
                            <div class="col-12">
                                <a href="#" class="button-1">Convert to change request</a>
                            </div>
                            <div class="col-12">
                                <a href="#" class="button-1" style="background: #6c84ee">Convert to task for
                                    execution</a>
                            </div>
                        </div>
                        <h6 class="title2 the-priority">Idea owner : <span>Ahmed Shalaby</span></h6>
                    </div>

                </div>
                <div class="d-flex justify-content-between align-items-center text-center mt_15 mb_20">
                    <a href="#" class="icon-square" title="edit"><i class="ti-pencil"></i></a>
                    <a href="#" class="icon-square icon-square2" title="share"><i class="ti-sharethis"></i></a>
                    <a href="#" class="icon-square icon-square3" title="save"><img src="img/pdf2.png"
                            height="20"></a>
                </div>

            </div>
        </x-slot:profile>
        <x-slot:comments>
            <ul class="comment-box list-unstyled mb-0">
                <li class="post_comment">
                    <div class="media post_author mt_60">
                        <div class="media-left">
                            <img class="rounded-circle" src="img/profile1.png" alt="">
                            <a href="#" class="replay"><i class="ti-share"></i></a>
                        </div>
                        <div class="media-body">
                            <h5 class=" t_color3 f_size_18 f_500">Mohamed Ali</h5>
                            <h6 class=" f_size_15 f_400 mb_20">24 March 2023</h6>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a
                                page when looking at its layout</p>
                        </div>
                    </div>
                    <ul class="reply-comment list-unstyled">
                        <li class="post-comment">
                            <div class="media post_author comment-content">
                                <div class="media-left">
                                    <img class="rounded-circle" src="img/profile2.png" alt="">
                                    <a href="#" class="replay"><i class="ti-share"></i></a>
                                </div>
                                <div class="media-body">
                                    <h5 class=" t_color3 f_size_18 f_500">Mohamed Ali</h5>
                                    <h6 class=" f_size_15 f_400 mb_20">24 March 2023</h6>
                                    <p>It is a long established fact that a reader will be distracted by the readable
                                        content of a page when looking at its layout</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </x-slot:comments>
        <x-slot:writeComment>
            <form class="get_quote_form row" action="#" method="post">
                <div class="col-md-12 form-group">
                    <textarea class="form-control message" placeholder="Write your comment here .."></textarea>
                </div>
                <div class="col-md-12"><button class="btn_hover agency_banner_btn btn-bg" type="submit">Send</button></div>
            </form>
        </x-slot:writeComment>
    </x-feature.show>
@endsection
