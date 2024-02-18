@extends('layouts.subscriber.app', ['title' => @__('feature/support.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/support.title'), 'route' => route('support.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>

            <form method="GET" hx-get="{{ route('support.search') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="name">
                <input type="hidden" name="columns[]" value="classification">
                <input type="hidden" name="model" value="support">
                <input type="search" name="search" class="form-control widget_input"
                    placeholder="{{ __('feature/support.search') }}" hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>
        <x-slot:actions>
            <x-button type="link" href="{{ route('support.create') }}">
                <i class="ti-plus"></i>
                @__('feature/support.add')
            </x-button>
        </x-slot:actions>
        <x-slot:filter>
            <h5>@__('feature/support.showing')</h5>
            <x-filter :route="route('support.search')" :columns="['status']" model="support" :options="$statuses" />
        </x-slot:filter>

        <x-slot:list>
            @forelse ($supports as $support)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <figure><a href="#"><img src="{{favicon()}}" alt=""></a></figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('support.show', $support) }}"
                                                class="f_500 t_color3">{{ $support->name }}</a>
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li class="p_color1">{{ $support->status }}</li>
                                            <li>
                                                {{ \Carbon\Carbon::parse($support->created_at)->format('l, j F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <form action="{{ route('support.destroy', $support) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="shortlist" title="Delete">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="like-btn">
                                                <a href="{{ route('support.edit', $support) }}" class="shortlist"
                                                    title="Edit">
                                                    <i class="ti-pencil"></i>
                                                </a>

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
            {!! $supports->links() !!}
        </x-slot:pagination>

    </x-feature.index>
@endsection
