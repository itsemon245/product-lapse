@extends('layouts.subscriber.app', ['title' => @__('Ticket details')])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('Ticket details'), 'route' => route('support.show', $support)]]" />
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
                            <h6 class="title2">@__('Priority')</h6>
                            <p class="f_400 mb-30 text-font">{{ $support->priority }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="title2">@__('Classification')</h6>
                            <p class="f_400 mb-30 text-font">{{ $support->classification }}</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="title2">@__('End date')</h6>
                            <p class="f_400 mb-30 text-font">
                                {{ \Carbon\Carbon::parse($support->completion_date)->format('l, j F Y') }}</p>
                        </div>
                        <div class="col-md-12">
                            <h6 class="title2">@__('Change request details')</h6>
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
                            <img class="rounded-circle" src="{{ favicon($creator->image) }}"
                                alt="">
                            <div class="media-body">
                                <h5 class=" t_color3 f_size_18 f_500">{{ $creator->name }}</h5>
                            </div>
                        </div>
                        @can('update support')
                            <div class="row text-center">
                                <h6 class="title2 the-priority"> @__('Status :')<span>{{ $support->status }}</span></h6>
                            </div>
                            <form action="{{ route('support.update.status', $support) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-6">
                                        <x-modal title="{{ __('Update Support Status') }}" label="Change">
                                            <div>
                                                <div class="row">
                                                    @forelse ($statuses as $status)
                                                        <div class="col-12">
                                                            <div class="extra extra2 extra3">
                                                                <div class="media post_author state-select">
                                                                    <div class="checkbox remember">
                                                                        <label>
                                                                            <input type="radio" name="status"
                                                                                value="{{ $status->value->{app()->getLocale()} }}"
                                                                                @if ($support->status == $status->value->{app()->getLocale()}) checked @endif>
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
                                        <button type="submit" class="button-1 btn-bg-2"><i
                                                class="ti-reload"></i>@__('Update')</button>
                                    </div>
                                </div>
                            </form>
                        @else
                            <div class="row text-center">
                                <h6 class="title2 the-priority">@__('Status :') <span>{{ $support->status }}</span></h6>
                            </div>
                        @endcan
                    </div>

                </div>
            </div>
        </x-slot:profile>
        <x-comments :model="$support" :comments="$support->comments" />
    </x-feature.show>
    {{-- <x-update-modal :options="$statuses" /> --}}
@endsection
<div class="col-6">


</div>
<div class="col-6">
    <button type="submit" class="button-1 btn-bg-2"><i class="ti-reload"></i>@__('Update')</button>
    </form>
</div>
