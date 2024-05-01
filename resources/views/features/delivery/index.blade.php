@extends('layouts.subscriber.app', ['title' => @__('feature/delivery.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/delivery.title'), 'route' => route('delivery.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            <form method="GET" hx-get="{{ route('delivery.search') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="name">
                <input type="hidden" name="columns[]" value="items">
                <input type="hidden" name="model" value="delivery">
                <input type="search" name="search" class="form-control widget_input"
                    placeholder="{{ __('feature/delivery.search') }}" hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>

        <x-slot:actions>
            @can('create delivery')
                <x-button type="link" href="{{ route('delivery.create') }}">
                    <x-button type="submit" action={{ route('delivery.create') }}>
                        <i class="ti-plus"></i>
                        @__('feature/delivery.add')
                    </x-button>
                @endcan
        </x-slot:actions>

        <x-slot:filter>
            <x-my-filter :route="route('delivery.search')" :columns="['administrator']" model="delivery" />
        </x-slot:filter>

        <x-slot:list>
            @forelse ($deliveries as $delivery)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <figure><a href="#"><img src="{{ favicon($delivery->image) }}" alt=""></a>
                            </figure>
                            <div class="joblisting_text document-list">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4 class="f_size_20 f_500 col-md-12 flex items-center"><a
                                                href="{{ route('delivery.show', $delivery) }}" target="_blank"
                                                class="f_500 t_color3">{{ $delivery->name }}</a><img
                                                class=" {{ $delivery->is_agreed == null ? 'd-none' : '' }} deliver-img"
                                                src="{{ $delivery->is_agreed == 1 ? asset('img/done.png') : asset('img/cancel.png') }}"
                                                title="Approved"></h4>
                                        {{-- <h4><a href="{{ route('delivery.show', $delivery) }}" onclick="window.open('{{ route('delivery.show', $delivery) }}','name','width=600,height=600')" target="popup"
                                                class="f_500 t_color3">{{ $delivery->name }}</a></h4> --}}
                                        <ul class="list-unstyled">
                                            <li>
                                                {{ \Carbon\Carbon::parse($delivery->required_completion_date)->format('l, j F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            @can('delete delivery')
                                                <div class="like-btn">
                                                    <x-button type="delete" :action="route('delivery.destroy', $delivery)" :has-icon="true">
                                                        <span class="ti-trash"></span>
                                                    </x-button>
                                                </div>
                                            @endcan
                                            @can('update delivery')
                                                <div class="like-btn">
                                                    <x-btn-icons type="anchor" value="<i class='ti-pencil'></i>"
                                                        href="{{ route('delivery.edit', $delivery) }}" />
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
            {!! $deliveries->links() !!}
        </x-slot:pagination>
    </x-feature.index>
@endsection
