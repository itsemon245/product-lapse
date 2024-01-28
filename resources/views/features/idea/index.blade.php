@extends('layouts.subscriber.app', ['title' => @__('feature/idea.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/idea.title'), 'route' => route('idea.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            <form action="#" class="search-form input-group">
                <input type="search" class="form-control widget_input" placeholder="@__('feature/idea.search')">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>

        <x-slot:actions>
            <x-button type="link" href="{{ route('idea.create') }}" >
                <i class="ti-plus"></i>
                @__('feature/idea.add')
            </x-button>
        </x-slot:actions>


        <x-slot:filter>
            <h5>@__('feature/idea.showing')</h5>
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
            @foreach ($ideas as $idea)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('idea.show', $idea) }}" class="f_500 t_color3">{{ $idea->name }}</a>
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li class="p_color4">{{ $idea->owner }}</li>
                                            <li class="p_color4"> @lang('idea.' . $idea->priority) </li>
                                            <li class="p_color4">
                                                {{ \Carbon\Carbon::parse($idea->created_at)->format('l, j F Y') }}</li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <form
                                                    action="{{ route('idea.destroy',$idea) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="shortlist" title="Delete">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                            <div class="like-btn">
                                                <a href="{{ route('idea.edit', $idea) }}"
                                                    class="shortlist" title="Edit">
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
            @endforeach
        </x-slot:list>
    </x-feature.index>
@endsection
