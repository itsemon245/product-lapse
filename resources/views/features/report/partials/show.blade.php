@extends('layouts.subscriber.app', ['title' => @__('feature/report.show')])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/report.show'), 'route' => route('support.show', $report)]]" />
        </x-slot:breadcrumb>

        <x-slot:details>
            <div class="col-lg-8 blog_sidebar_left">
                <div class="blog_single mb_50">
                    <div class="row">
                        <h5 class="f_size_20 f_500 col-md-12">{{ $report->name }}</h5>
                        <div class="entry_post_info col-md-12">
                            {{ \Carbon\Carbon::parse($report->report_date)->format('l, j F Y') }}
                        </div>
                        <div class="col-md-12">
                            <h6 class="title2">@__('feature/report.classification')</h6>
                            <p class="f_400 mb-30 text-font"> {{ $report->getSelect('type')->value->{app()->getLocale()} }} </p>
                        </div>
                        <div class="col-md-12">
                            <h6 class="title2">@__('feature/report.details')</h6>
                            <p class="f_400 mb-30 text-font">
                                {{ $report->description }}
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
                        @can('update report')
                            <div class="row">
                                <div class="col-12">
                                    <a href="{{ route('report.edit', $report) }}" class="button-1 btn-bg-2"><i
                                            class="ti-reload"></i>@__('feature/report.update')</a>
                                </div>
                            </div>
                        @endcan
                    </div>

                </div>
            </div>
        </x-slot:profile>
        <x-comments :model="$report" :comments="$report->comments" />
    </x-feature.show>
@endsection
