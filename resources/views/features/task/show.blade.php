@extends('layouts.feature.index', ['title' => 'Tasks'])
@section('main')
    <section class="sign_in_area bg_color sec_pad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 blog_sidebar_left">
                    <div class="blog_single mb_50">
                        <div class="">
                            <h5 class="f_size_20 f_500">{{ $task->name }}</h5>
                            <div class="entry_post_info">
                                {{ \Carbon\Carbon::parse($task->created_at)->format('l, j F Y') }}
                            </div>
                            <h6 class="title2">Classification</h6>
                            <p class="f_400 mb-30 text-font">{{ $task->category }}</p>
                            <h6 class="title2">Task details</h6>
                            <p class="f_400 mb-30 text-font">
                                It is a long established fact that a reader will be distracted by the readable
                                content of a page when looking at its layout. The point of using Lorem Ipsum is that
                                it has a more-or-less normal distribution of letters, as opposed to using 'Content
                                here, content here', making it look like readable English
                            </p>
                            <h6 class="title2">Task details</h6>
                            <ul class="list-unstyled f_400 mb-30 text-font list-details">
                                <li><i class="ti-check"></i>It is a long established fact that a reader will be
                                    distracted by the readable</li>
                                <li><i class="ti-check"></i>It is a long established fact that a reader will be
                                    distracted by the readable</li>
                                <li><i class="ti-check"></i>It is a long established fact that a reader will be
                                    distracted by the readable</li>
                                <li><i class="ti-check"></i>It is a long established fact that a reader will be
                                    distracted by the readable</li>
                            </ul>
                            <div>
                                <h6 class="title2">Attachments</h6>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>The name</td>
                                                <td><button class="btn_hover agency_banner_btn btn-bg btn-table"
                                                        type="submit">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>The name</td>
                                                <td><button class="btn_hover agency_banner_btn btn-bg btn-table"
                                                        type="submit">View</button></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>The name</td>
                                                <td><button class="btn_hover agency_banner_btn btn-bg btn-table"
                                                        type="submit">View</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
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
                            <h6 class="title2 the-priority">Added by : <span>Mohamed Ali</span></h6>
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
                                        data-target="#myModal1">Working on</button>
                                </div>
                                <div class="col-6">
                                    <a href="#" class="button-1 btn-bg-2"><i class="ti-reload"></i>Update</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-8 blog_sidebar_left">
                    <div class="widget_title">
                        <h3 class=" f_size_20 t_color3">Comments</h3>
                        <div class="border_bottom"></div>
                    </div>
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
                                    <p>It is a long established fact that a reader will be distracted by the
                                        readable content of a page when looking at its layout</p>
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
                                            <p>It is a long established fact that a reader will be distracted by the
                                                readable content of a page when looking at its layout</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <div class="widget_title">
                        <h3 class=" f_size_20 t_color3">Write Comment</h3>
                        <div class="border_bottom"></div>
                    </div>
                    <form class="get_quote_form row" action="#" method="post">
                        <div class="col-md-12 form-group">
                            <textarea class="form-control message" placeholder="Write your comment here .."></textarea>
                        </div>
                        <div class="col-md-12"><button class="btn_hover agency_banner_btn btn-bg"
                                type="submit">Send</button></div>
                    </form>
                </div>

            </div>
        </div>
    </section>

    <!-- The Modal -->
    <div class="modal fade" id="myModal1">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Change state</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('task.change.status', $task) }}" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container-fluid">


                            <div class="row"> @csrf
                                <div class="col-12">
                                    <div class="extra extra2 extra3">
                                        <div class="media post_author state-select">
                                            <div class="checkbox remember">
                                                <label>
                                                    <input type="radio" name="status" value="started">
                                                </label>
                                            </div>

                                            <div class="media-body">
                                                <h5 class=" t_color3 f_size_16 f_500">Working on</h5>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="extra extra2 extra3">
                                        <div class="media post_author state-select">
                                            <div class="checkbox remember">
                                                <label>
                                                    <input type="radio" name="stats" value="not_started">
                                                </label>
                                            </div>

                                            <div class="media-body">
                                                <h5 class=" t_color3 f_size_16 f_500">Pending</h5>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="extra extra2 extra3">
                                        <div class="media post_author state-select">
                                            <div class="checkbox remember">
                                                <label>
                                                    <input type="radio" name="status" value="stopped">
                                                </label>
                                            </div>

                                            <div class="media-body">
                                                <h5 class=" t_color3 f_size_16 f_500">Stopped</h5>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">Save</button>
                        <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg-grey"
                            data-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
