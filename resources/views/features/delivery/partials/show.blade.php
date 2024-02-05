@extends('layouts.subscriber.app', ['title' => @__('feature/delivery.show')])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/delivery.show'), 'route' => route('change.show', base64_encode($delivery->id))]]" />
        </x-slot:breadcrumb>

        <x-slot:details>
            <div class="col-lg-8 blog_sidebar_left">
                <div class="blog_single mb_50">
                    <div class="row">
                        <h5 class="f_size_20 f_500 col-md-12">{{ $delivery->name }}<img class="deliver-img" src="img/done.png"
                                title="Approved"></h5>
                        <div class="col-md-6">
                            <h6 class="title2">Delivery link</h6>
                            <p class="f_400 mb-30 text-font">{{ $delivery->link }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="title2">Delivery date</h6>
                            <p class="f_400 mb-30 text-font">
                                {{ \Carbon\Carbon::parse($delivery->created_at)->format('l, j F Y') }}</p>
                        </div>
                        <div class="col-md-12">
                            <h6 class="title2">Delivery items</h6>
                            <p class="f_400 mb-30 text-font">
                                {{ $delivery->items }}
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
                            <img class="rounded-circle" src="img/profile1.png" alt="">
                            <div class="media-body">
                                <h5 class=" t_color3 f_size_18 f_500">Ahmed Mahmoud</h5>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <span class="button-1 btn-bg-1">Workin on</span>
                            </div>
                            <div class="col-6">
                                <a href="#" class="button-1 btn-bg-2"><i class="ti-reload"></i>Update</a>
                            </div>
                        </div>
                    </div>

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
