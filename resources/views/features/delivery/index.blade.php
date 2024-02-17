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
            <x-button type="link" href="{{ route('delivery.create') }}">
                <x-button type="submit" action={{ route('delivery.create') }}>
                    <i class="ti-plus"></i>
                    @__('feature/delivery.add')
                </x-button>
        </x-slot:actions>

        <x-slot:filter>
            {{-- Empty --}}
        </x-slot:filter>

        <x-slot:list>
            @forelse ($deliveries as $delivery)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <div class="joblisting_text document-list">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('delivery.show', $delivery) }}"
                                                class="f_500 t_color3">{{ $delivery->name }}</a></h4>
                                        <ul class="list-unstyled">
                                            <li>
                                                {{ \Carbon\Carbon::parse($delivery->required_completion_date)->format('l, j F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <form action="{{ route('delivery.destroy', $delivery) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-btn-icons type="submit" class="btn"
                                                        value="<i class='ti-trash'></i>" />
                                                </form>
                                            </div>
                                            <div class="like-btn">
                                                <x-btn-icons type="anchor" value="<i class='ti-pencil'></i>"
                                                    href="{{ route('delivery.edit', $delivery) }}" />
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
            {!! $deliveries->links() !!}
        </x-slot:pagination>
    </x-feature.index>
@endsection
