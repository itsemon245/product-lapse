@extends('layouts.subscriber.app', ['title' => @__('feature/idea.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/idea.title'), 'route' => route('idea.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            <form method="GET" hx-get="{{ route('idea.search') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="name">
                <input type="hidden" name="columns[]" value="owner">
                <input type="hidden" name="model" value="Idea">
                <input type="search" name="search" class="form-control widget_input"
                    placeholder="{{ __('feature/idea.search') }}" hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>

        <x-slot:actions>
            @can('create idea')
                <x-button type="link" href="{{ route('idea.create') }}">
                    <i class="ti-plus"></i>
                    @__('feature/idea.add')
                </x-button>
            @endcan
        </x-slot:actions>


        <x-slot:filter>
            <h5>@__('feature/idea.showing')</h5>
            <x-filter :route="route('idea.search')" :columns="['priority']" model="idea" :options="$priorities" />
        </x-slot:filter>

        <x-slot:list>
            @forelse ($ideas as $idea)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('idea.show', $idea) }}"
                                                class="f_500 t_color3">{{ $idea->name }}</a>
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li class="p_color4">{{ $idea->owner }}</li>
                                            <li class="p_color4"> {{ $idea->priority }} </li>
                                            <li class="p_color4">
                                                {{ \Carbon\Carbon::parse($idea->created_at)->format('l, j F Y') }}</li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            @can('delete idea')
                                                <div class="like-btn">
                                                    <form action="{{ route('idea.destroy', $idea) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="shortlist" title="Delete">
                                                            <i class="ti-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endcan

                                            @can('update idea')
                                                <div class="like-btn">
                                                    <a href="{{ route('idea.edit', $idea) }}" class="shortlist" title="Edit">
                                                        <i class="ti-pencil"></i>
                                                    </a>
                                                </div>
                                            @endcan
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
            {!! $ideas->links() !!}
        </x-slot:pagination>
    </x-feature.index>
@endsection
