@extends('layouts.feature.index', ['title' => @__('feature/task.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/task.title'), 'route' => route('task.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>
            <form action="#" class="search-form input-group">
                <input type="search" class="form-control widget_input" placeholder="{{ __('feature/task.search') }}">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>

        <x-slot:actions>
            <x-button href="{{ route('task.create') }}" type="link">
                <i class="ti-plus"></i>
                @__('feature/task.add')
            </x-button>
        </x-slot:actions>

        <x-slot:filter>
            <div class="row">
                <div class="col-md-6">
                    <h5>@__('feature/task.showing1')</h5>
                    <form method="get" action="#">
                        <select class="selectpickers selectpickers2" style="display: none;">
                            <option value="">All</option>
                            <option value="">Durable product</option>
                            <option value="">Initial idea</option>
                            <option value="">Stopped</option>
                        </select>
                        <div class="nice-select selectpickers selectpickers2" tabindex="0"><span
                                class="current">All</span>
                            <ul class="list">
                                <li data-value="" class="option selected focus">All</li>
                                <li data-value="" class="option">Durable product</li>
                                <li data-value="" class="option">Initial idea</li>
                                <li data-value="" class="option">Stopped</li>
                            </ul>
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                    <h5>@__('feature/task.showing2')</h5>
                    <form method="get" action="#">
                        <select class="selectpickers selectpickers2" style="display: none;">
                            <option value="">All</option>
                            <option value="">Durable product</option>
                            <option value="">Initial idea</option>
                            <option value="">Stopped</option>
                        </select>
                        <div class="nice-select selectpickers selectpickers2" tabindex="0"><span
                                class="current">All</span>
                            <ul class="list">
                                <li data-value="" class="option selected focus">All</li>
                                <li data-value="" class="option">Durable product</li>
                                <li data-value="" class="option">Initial idea</li>
                                <li data-value="" class="option">Stopped</li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </x-slot:filter>

        <x-slot:list>
            @foreach ($tasks as $task)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <figure><a href="#"><img src="img/p6.png" alt=""></a></figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('task.show', $task) }}"
                                                class="f_500 t_color3">{{ $task->name }}</a>
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li class="p_color3">{{ $task->status }}</li>
                                            <li>
                                                {{ \Carbon\Carbon::parse($task->created_at)->format('l, j F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <form action="{{ route('task.destroy', $task) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="shortlist" title="Delete">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                            <div class="like-btn">
                                                <a href="{{ route('task.edit', $task) }}" class="shortlist" title="Edit">
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
