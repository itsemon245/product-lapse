@extends('layouts.subscriber.app', ['title' => @__('feature/change.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/change.title'), 'route' => route('change.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>
        <form method="GET" hx-get="{{ route('change.search') }}" hx-trigger="submit" hx-target="#search-results" hx-select="#search-results" class="search-form input-group">
            <input type="hidden" name="columns[]" value="title">
            <input type="hidden" name="columns[]" value="classification">
            <input type="hidden" name="model" value="change">
            <input type="search" name="search" class="form-control widget_input" placeholder="{{  __('feature/change.search') }}" hx-vals="#search-results">
            <button type="submit"><i class="ti-search"></i></button>
        </form>
        </x-slot:search>

        <x-slot:actions>
            <x-button type="link" href="{{ route('change.create') }}">
                <i class="ti-plus"></i>
                @__('feature/change.add')
            </x-button>
        </x-slot:actions>

        <x-slot:filter>
            <h5>@__('feature/change.showing')</h5>
            <form method="get" action="#">
                <select class="selectpickers selectpickers2" style="display: none;">
                    <option value="">All</option>
                    <option value="">Durable product</option>
                    <option value="">Initial idea</option>
                    <option value="">Stopped</option>
                </select>
                <div class="nice-select selectpickers selectpickers2" tabindex="0"><span class="current">All</span>
                    <ul class="list">
                        <li data-value="" class="option selected focus">All</li>
                        <li data-value="" class="option">Durable product</li>
                        <li data-value="" class="option">Initial idea</li>
                        <li data-value="" class="option">Stopped</li>
                    </ul>
                </div>
            </form>
        </x-slot:filter>

        <x-slot:list>
            @forelse ($changes as $change)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <figure><a href="#"><img src="img/p6.png" alt=""></a></figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('change.show', $change) }}"
                                                class="f_500 t_color3">{{ $change->title }}</a></h4>
                                        <ul class="list-unstyled">
                                            <li class="p_color1">{{ $change->status }}</li>
                                            <li>{{ \Carbon\Carbon::parse($change->created_at)->format('l, j F Y') }}</li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <form action="{{ route('change.destroy', $change) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-btn-icons type="submit" class="btn"
                                                        value="<i class='ti-trash'></i>" />
                                                </form>
                                            </div>
                                            <div class="like-btn">
                                                <x-btn-icons type="anchor" value="<i class='ti-pencil'></i>"
                                                    href="{{ route('change.edit', $change) }}" />
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

    </x-feature.index>
@endsection
