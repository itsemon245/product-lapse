@extends('layouts.subscriber.app', ['title' => @__('feature/report.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/report.title'), 'route' => route('report.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            <form method="GET" hx-get="{{ route('report.search') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="name">
                <input type="hidden" name="columns[]" value="type">
                <input type="hidden" name="model" value="report">
                <input type="search" name="search" class="form-control widget_input"
                    placeholder="{{ __('feature/report.search') }}" hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>


        <x-slot:actions>
            @can('create report')
                <x-button type="link" href="{{ route('report.create') }}">
                    <i class="ti-plus"></i>
                    @__('feature/report.add')
                </x-button>
            @endcan
        </x-slot:actions>

        <x-slot:filter>
            <h5>@__('feature/report.showing')</h5>
            <x-filter :route="route('report.search')" :columns="['type']" model="report" :options="$types" />
        </x-slot:filter>

        <x-slot:list>
            @forelse ($reports as $report)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            @php
                                $creator = App\Models\User::where('id', $report->creator_id)->with('image')->first();

                            @endphp
                            <figure><a href="{{ route('report.show', $report) }}"><img src="{{ favicon($creator->image) }}" alt=""></a>
                            </figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('report.show', $report) }} class="f_500
                                                t_color3">{{ $report->name }}</a></h4>
                                        <ul class="list-unstyled">
                                            <li>{{ $report->created_at->formatLocalized('%A %d %B %Y') }}</li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="jobsearch-table-cell">
                                                <div class="jobsearch-job-userlist">
                                                    @can('delete report')
                                                        <div class="like-btn">
                                                            <form action="{{ route('report.destroy', $report) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <x-btn-icons type="submit" class="btn"
                                                                    value="<i class='ti-trash'></i>" />
                                                            </form>
                                                        </div>
                                                    @endcan

                                                    @can('update report')
                                                        <div class="like-btn">
                                                            <x-btn-icons type="anchor" value="<i class='ti-pencil'></i>"
                                                                href="{{ route('report.edit', $report) }}" />
                                                        </div>
                                                    @endcan

                                                    <div class="like-btn">
                                                        <form
                                                            action="{{ route('report.download', ['id' => base64_encode($report->id)]) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <button type="submit" class="btn">
                                                                <i class="ti-download"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <x-feature.not-found />
            @endforelse
        </x-slot:list>
        <x-slot:pagination>
            {!! $reports->links() !!}
        </x-slot:pagination>
    </x-feature.index>
@endsection
