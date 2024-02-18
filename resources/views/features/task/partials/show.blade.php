@extends('layouts.subscriber.app', ['title' => @__('feature/task.show')])
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
                        @if ($task->file)
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
                        @endif
                    </div>
                </div>

            </div>
        </x-slot:details>

        <x-slot:profile>
            <div class="col-lg-4">
                <div class="blog-sidebar box-sidebar">
                    <div class="widget sidebar_widget widget_recent_post mt_60">
                        <div class="media post_author mt_60">
                            <img class="rounded-circle" src="{{ $task->creator->image->url ?? favicon() }}"
                                alt="">
                            <div class="media-body">
                                <h5 class=" t_color3 f_size_18 f_500">
                                    {{ $task->creator->name }}</h5>
                            </div>
                        </div>
                        <h6 class="title2 the-priority">@__('feature/task.added') : <span>{{ str($task->administrator)->title() }}</span></h6>
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
        <x-comments :model="$task" :comments="$task->comments" />
    </x-feature.show>
@endsection
