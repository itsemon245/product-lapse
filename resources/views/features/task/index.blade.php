@extends('layouts.feature.index', ['title' => 'Tasks'])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Task', 'route' => route('task.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>
            <form action="#" class="search-form input-group">
                <input type="search" class="form-control widget_input" placeholder="Search product">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>

        <x-slot:actions>
            <x-button hx-get="{{ route('support.create') }}" hx-push-url="true" hx-target="#hx-global-target"
                hx-select="#hx-global-target">
                <i class="ti-plus"></i>
                Add Task
            </x-button>
        </x-slot:actions>

        <x-slot:filter>
            <h5>Showing packages</h5>
            <form method="get" action="#">
                <select class="selectpickers selectpickers2" style="display: none;">
                    <option value="">All</option>
                    <option value="">Durable product</option>
                    <option value="">Initial idea</option>
                    <option value="">Stopped</option>
                </select><div class="nice-select selectpickers selectpickers2" tabindex="0"><span class="current">All</span><ul class="list"><li data-value="" class="option selected focus">All</li><li data-value="" class="option">Durable product</li><li data-value="" class="option">Initial idea</li><li data-value="" class="option">Stopped</li></ul></div>
            </form>
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
                                    <h4><a href="{{ route('task.show', ['task' => base64_encode($task->id)]) }}"
                                            class="f_500 t_color3">{{ $task->name }}</a>
                                    </h4>
                                    <ul class="list-unstyled">
                                        <li class="p_color3">@lang('task.' . $task->status)</li>
                                        <li>
                                            {{ \Carbon\Carbon::parse($task->created_at)->format('l, j F Y') }}
                                        </li>
                                    </ul>
                                </div>
                                <div class="jobsearch-table-cell">
                                    <div class="jobsearch-job-userlist">
                                        <div class="like-btn">
                                            <form
                                                action="{{ route('task.destroy', ['task' => base64_encode($task->id)]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="shortlist" title="Delete">
                                                    <i class="ti-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                        <div class="like-btn">
                                            <a href="{{ route('task.edit', ['task' => base64_encode($task->id)]) }}"
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
