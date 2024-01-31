@extends('layouts.feature.index', ['title' => @__('feature/task.show')])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/task.show'), 'route' => route('task.show', $task)]]" />
        </x-slot:breadcrumb>
        <x-slot:details>
            <div class="col-lg-8 blog_sidebar_left">
                <div class="blog_single mb_50">
                    <div class="">
                        <h5 class="f_size_20 f_500">{{ $task->name }}</h5>
                        <div class="entry_post_info">
                            {{ \Carbon\Carbon::parse($task->created_at)->format('l, j F Y') }}
                        </div>
                        <h6 class="title2">@__('feature/task.classification')</h6>
                        <p class="f_400 mb-30 text-font">{{ $task->category }}</p>
                        <h6 class="title2">@__('feature/task.details')</h6>
                        <p class="f_400 mb-30 text-font">
                            {{ $task->details }}
                        </p>
                        <h6 class="title2">@__('feature/task.steps')</h6>
                        <ul class="list-unstyled f_400 mb-30 text-font list-details">
                            {{ $task->steps }}
                        </ul>
                        <div>
                            <h6 class="title2">@__('feature/task.attach')</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>@__('feature/task.name')</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>@__('feature/task.t-name')</td>
                                            <td><button class="btn_hover agency_banner_btn btn-bg btn-table"
                                                    type="submit">@__('feature/task.view')</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
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
                                <h5 class=" t_color3 f_size_18 f_500">
                                    {{ $task->owner->first_name }} {{ $task->owner->last_name }}</h5>
                            </div>
                        </div>
                        <h6 class="title2 the-priority">@__('feature/task.added') : <span>Mohamed Ali</span></h6>
                        <div class="extra extra2 extra3">
                            <div class="media post_author" style="padding-top: 0">
                                <div class="checkbox remember">
                                    <label>
                                        <input type="checkbox" name="choose_mvp"
                                            @if ($task->choose_mvp) checked @endif>
                                    </label>
                                </div>

                                <div class="media-body">
                                    <h5 class="t_color3 f_size_17 f_600">MVP</h5>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <button type="button" class="button-1 btn-bg-1" data-toggle="modal"
                                    data-target="#myModal1">@__('feature/task.working')</button>
                            </div>
                            <div class="col-6">
                                <a href="#" class="button-1 btn-bg-2"><i class="ti-reload"></i>@__('feature/task.update')</a>
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
