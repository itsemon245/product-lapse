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
                            <a href="#" class="">@lang('Idea ' . $stage->value)</a>
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
                           
                            <img class="rounded-circle" src="{{ favicon($creator->image) }}" alt="">
                            <div class="media-body">
                                <h5 class=" t_color3 f_size_18 f_500">{{ $creator->name }}</h5>
                            </div>
                        </div>
                        <div class="row">
                            @can('update idea')
                                <div class="col-12">
                                    <form action="{{ route('idea.priority.update', $idea) }}" method="POST"
                                        class="login-form sign-in-form" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <x-select-input label="{{ __('feature/idea.label.priority') }}" id="priority"
                                                placeholder="{{ __('feature/idea.label.priority') }}" name="priority" required
                                                autofocus>

                                                @forelse ($priorities as $priority)
                                                    <option value="{{ $priority->id }}"
                                                        @if ($idea->priority == $priority->id ) selected @endif>
                                                        {{ $priority->value->{app()->getLocale()} }}
                                                    </option>
                                                @empty
                                                    <option disabled>{{ __('No Priority available') }}</option>
                                                @endforelse

                                            </x-select-input>
                                            <br>
                                            <button type="submit" class="button-1 btn-bg-2"><i
                                                    class="ti-pencil"></i>@__('feature/idea.update')</button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <h6 class="title2 the-priority">@__('Priority :') <span>{{ $idea->priority }}</span></h6>
                            @endcan

                            @can('create change')
                                <div class="col-12">
                                    <a href="{{ route('change.create', ['idea' => $idea->id]) }}"
                                        class="button-1">@__('feature/idea.change-request')</a>
                                </div>
                            @endcan

                            @can('create task')
                                <div class="col-12">
                                    <a href="{{ route('task.create', ['idea' => $idea->id]) }}" class="button-1"
                                        style="background: #6c84ee">@__('feature/idea.task')</a>
                                </div>
                            @endcan
                        </div>
                        <h6 class="title2 the-priority"> @__('Idea owner :') <span>{{ $idea->owner }}</span></h6>
                    </div>

                </div>
                <div class="d-flex justify-content-between align-items-center text-center mt_15 mb_20">
                    @can('update idea')
                        <a href="{{ route('idea.edit', $idea) }}" class="icon-square" title="Edit">
                            <i class="ti-pencil"></i>
                        </a>
                    @endcan
                    <a href="#" class="icon-square icon-square2" title="share" data-toggle="modal"
                        data-target="#myModal1"><i class="ti-sharethis"></i></a>
                    <a href="{{ route('pdf.generate', $idea) }}" target="_blank" class="icon-square icon-square3"
                        title="save">
                        <i class="ti-save"></i>
                    </a>
                </div>
            </div>
        </x-slot:profile>
        <x-comments :model="$idea" :comments="$idea->comments" />
    </x-feature.show>

    <div class="modal fade" id="myModal1">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">@__('feature/idea.clipboard')</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="extra extra2 extra3">
                                    <div class="media post_author state-select">
                                        <div class="checkbox remember">
                                            <p id="link"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" id="copyButton"
                        class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__('feature/idea.copy')</button>
                    <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg-grey"
                        data-dismiss="modal">@__('feature/idea.cancel')</button>
                </div>

            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <script>
        $(document).ready(function() {
            var currentUrl = window.location.href;
            $('#currentUrl').text(currentUrl);

            const link = document.getElementById('link');
            link.innerHTML = currentUrl;

            var clipboard = new ClipboardJS('#copyButton', {
                text: function() {
                    return currentUrl;
                }
            });

            clipboard.on('success', function(e) {
                $('#myModal1').modal('hide');
                e.clearSelection();
            });

            clipboard.on('error', function(e) {
                alert('Failed to copy URL!');
            });
        });

        function pdf() {
            window.print();
        }
    </script>
@endpush
