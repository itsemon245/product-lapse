@extends('layouts.admin.app', ['title' => __('Users Management')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Users Management'), 'route' => route('users.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            <form hx-get="{{ route('users.search') }}" hx-vals="#search-results" hx-push-url="{{ route('users.search') }}" hx-trigger="submit" hx-target="#search-results" hx-select="#search-results" class="search-form input-group">
                @csrf
                <input type="hidden" name="name" >
                <input type="search" name="search" class="form-control widget_input" placeholder="{{ __('Search user') }}">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>


        <x-slot:actions>
            {{--  --}}
        </x-slot:actions>

        <x-slot:filter>
            {{-- {{ dd() }} --}}
            <form method="get" action="{{ route('users.filter') }}">
                <select onchange="this.form.submit()" name="search" class="selectpickers selectpickers2">
                    <option @selected(true) value="all">@__('filter.all')</option>
                    <option value="{{ null }}" @selected(request()->query('search') == null) >Active</option>
                    <option value="{{ !null }} @selected(request()->query('search') == !null) ">Banned</option>
                </select>
            </form>
        </x-slot:filter>
        <x-slot:list>
            @forelse ($subscribers as $subscriber)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item ">
                            <figure class="align-middle"><a href="#"><img src="{{ favicon() }}"
                                        alt=""></a></figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell !w-full">
                                        <h4><a href="{{ route('users.show', $subscriber) }}"
                                                class="f_500 t_color3">{{ $subscriber->name }}</a>
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li class="{{ $subscriber->banned_at == null ? 'text-success' : 'text-danger' }}"> {{ $subscriber->banned_at == null ? 'Active' : 'Banned' }} </li>
                                            <li class="p_color4">{{ $subscriber->phone }}</li>
                                            <li class="p_color4"> {{ $subscriber->workplace }} </li>
                                            <li class="">
                                                {{ \Carbon\Carbon::parse($subscriber->created_at)->format('l, j F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell !w-full">
                                        <div class="jobsearch-job-userlist !float-start">
                                            <form action="{{ route('user.ban', $subscriber) }}" method="post"
                                                class="like-btn">
                                                @csrf
                                                <button type="submit">
                                                    @if ($subscriber->banned_at == null)
                                                        <i class="ti-na" title="@__('Ban')"></i>
                                                    @else
                                                        <i class="ti-check" title="@__('Unban')"></i>
                                                    @endif
                                                </button>
                                            </fo>
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
