@extends('layouts.subscriber.app', ['title' => @__('feature/task.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/task.title'), 'route' => route('task.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>


            <form method="GET" hx-get="{{ route('task.search') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="name">
                <input type="hidden" name="columns[]" value="details">
                <input type="hidden" name="model" value="task">
                <input type="search" name="search" class="form-control widget_input"
                    placeholder="{{ __('feature/task.search') }}" hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>

        <x-slot:actions>
            @can('create task')
                <x-button href="{{ route('task.create') }}" type="link">
                    <i class="ti-plus"></i>
                    @__('feature/task.add')
                </x-button>
            @endcan
        </x-slot:actions>

        <x-slot:filter>
            <h5>@__('feature/task.showing2')</h5>
            <x-filter :route="route('task.search')" :columns="['status']" model="task" :options="$priorities" />
        </x-slot:filter>

        <x-slot:list>
            @forelse ($tasks as $task)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            @php
                                $creator = App\Models\User::where('id', $task->creator_id)->with('image')->first();
                            @endphp
                             <figure><a href="#"><img src="{{ favicon($creator->image) }}" alt=""></a></figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('task.show', $task) }}"
                                                class="f_500 t_color3">{{ $task->name }}</a>
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li class="p_color3">{{ $task->status }}</li>
                                            <li class="text-muted">
                                                {{ \Carbon\Carbon::parse($task->created_at)->format('l, j F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            @can('delete task')
                                                <div class="like-btn">
                                                    <x-button type="delete" :action="route('task.destroy', $task)" :has-icon="true">
                                                        <span class="ti-trash"></span>
                                                    </x-button>
                                                </div>
                                            @endcan
                                            @can('update task')
                                                <div class="like-btn">
                                                    <a href="{{ route('task.edit', $task) }}" class="shortlist" title="Edit">
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
            {!! $tasks->links() !!}
        </x-slot:pagination>
    </x-feature.index>
@endsection
