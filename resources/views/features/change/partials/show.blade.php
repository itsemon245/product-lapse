@extends('layouts.subscriber.app', ['title' => @__('feature/change.show')])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[
                ['label' => @__('feature/change.title'), 'route' => route('change.index')],
                ['label' => @__('feature/change.show'), 'route' => route('change.show', base64_encode($change->id))],
            ]" />
        </x-slot:breadcrumb>

        <x-slot:details>
            <div class="col-lg-8 blog_sidebar_left">
                <div class="blog_single mb_50">
                    <div class="row">
                        <h5 class="f_size_20 f_500 col-md-12">{{ $change->title }}</h5>
                        <div class="entry_post_info col-md-12">
                            {{ \Carbon\Carbon::parse($change->required_completion_date)->format('l, j F Y') }}
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h6 class="title2">@__('feature/change.priority')</h6>
                            <p class="f_400 mb-30 text-font">
                                {{ $change->getSelect('priority')->value->{app()->getLocale()} }}</p>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <h6 class="title2">@__('feature/change.classification')</h6>
                            <p class="f_400 mb-30 text-font">
                                {{ $change->getSelect('classification')->value->{app()->getLocale()} }}</p>
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
                            <img class="rounded-circle" src="{{ favicon($creator->image) }}" alt="">
                            <div class="media-body">
                                <h5 class=" t_color3 f_size_18 f_500">{{ $creator->name }}</h5>
                            </div>
                        </div>
                        @can('update change')
                            <div class="row">
                                <div class="col-12">
                                    <h6 class="title2 the-priority">
                                        @__('Status :')<span>{{ $change->getSelect('status')->value->{app()->getLocale()} }}</span>
                                    </h6>
                                </div>
                                <div class="col-6">
                                    <form action="{{ route('change.update.status', $change) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        @php
                                            $modalID = uniqid('modal-');
                                        @endphp
                                        <x-modal :id="$modalID" title="Update Change Status">
                                            <x-slot:trigger>
                                                <button type="button" class="button-1 btn-bg-1" data-toggle="modal"
                                                    data-target="#{{ $modalID }}">
                                                    {{ $change->getSelect('status')?->value?->{app()->getLocale()} }}
                                                </button>
                                            </x-slot:trigger>
                                            <div>
                                                <div class="row">
                                                    @forelse ($statuses as $status)
                                                        <div class="col-12">
                                                            <div class="extra extra2 extra3">
                                                                <div class="media post_author state-select">
                                                                    <div class="checkbox remember">
                                                                        <label>
                                                                            <input type="radio" name="status"
                                                                                value="{{ $status->id }}"
                                                                                @if ($change->status == $status->id) checked @endif>
                                                                        </label>
                                                                    </div>
                                                                    <div class="media-body">
                                                                        <h5 class="t_color3 f_size_16 f_500">
                                                                            {{ $status->value->{app()->getLocale()} }}</h5>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @empty
                                                        <!-- Handle case where there are no statuses -->
                                                    @endforelse

                                                </div>
                                            </div>
                                        </x-modal>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('change.edit', ['change' => $change]) }}" class="button-1 btn-bg-2"><i
                                            class="ti-reload"></i>@__('feature/change.update')</a>
                                    </form>
                                </div>
                            </div>
                        @else
                            <div class="row text-center">
                                <h6 class="title2 the-priority">@__('Status :')
                                    <span>{{ $change->getSelect('status')->value->{app()->getLocale()} }}</span>
                                </h6>
                            </div>
                        @endcan

                    </div>

                </div>
            </div>
        </x-slot:profile>
        <x-comments :model="$change" :comments="$change->comments" />
    </x-feature.show>
    {{-- <x-update-modal :options="$statuses" /> --}}
@endsection
