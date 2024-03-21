@extends('layouts.admin.app', ['title' => __('Users Management')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Users Management'), 'route' => route('users.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:actions>
            <x-button type="link" href="{{ route('users.create') }}">
                <x-button type="submit" action={{ route('users.create') }}>
                    <i class="ti-plus"></i>
                    @__('Create user')
                </x-button>
        </x-slot:actions>

        <x-slot:search>
            <form hx-get="{{ route('users.search') }}" hx-vals="#search-results" hx-push-url="{{ route('users.search') }}"
                hx-trigger="submit" hx-target="#search-results" hx-select="#search-results" class="search-form input-group">
                @csrf
                <input type="hidden" name="name">
                <input type="search" name="search" class="form-control widget_input"
                    placeholder="{{ __('Search user') }}">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>

        <x-slot:filter>
            {{-- {{ dd() }} --}}
            <form method="get" action="{{ route('users.index') }}">
                <select onchange="this.form.submit()" name="search" class="selectpickers selectpickers2">
                    <option selected>@__('All')</option>
                    <option value="active" @selected(request()->query('search') == 'active')>@__('Active')</option>
                    <option value="banned" @selected(request()->query('search') == 'banned') ">@__('Banned')</option>
                    <option value="verified" @selected(request()->query('search') == 'verified')>@__('Verified')</option>
                    <option value="unverified" @selected(request()->query('search') == 'unverified') ">@__('Unverified')</option>
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
                                            @if ($subscriber->email_verified_at == null)
                                                <li class="text-danger">@__("Unverified") </li>
                                            @else
                                                <li
                                                    class="{{ $subscriber->banned_at == null ? 'text-success' : 'text-danger' }}">
                                                    {{ $subscriber->banned_at == null ? __('Active') : __('Banned') }} </li>
                                            @endif

                                            <li class="p_color4">{{ $subscriber->phone }}</li>
                                            <li class="p_color4"> {{ $subscriber->workplace }} </li>
                                            <li class="">
                                                {{ \Carbon\Carbon::parse($subscriber->created_at)->format('l, j F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell !w-full mr-2">
                                        <div class="jobsearch-job-userlist !float-start">
                                            <form action="{{ route('user.ban', $subscriber) }}" method="post"
                                                class="like-btn">
                                                @csrf
                                                <button type="submit">
                                                    @if ($subscriber->banned_at == null)
                                                        <i class="ti-na" ></i>
                                                    @else
                                                        <i class="ti-check" ></i>
                                                    @endif
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    @if ($subscriber->type == null)
                                        <div class="jobsearch-table-cell !w-full">
                                            <div class="jobsearch-job-userlist !float-start">
                                                <form action="{{ route('user.active', $subscriber) }}" method="post"
                                                    class="like-btn">
                                                    @csrf
                                                    <button type="submit">
                                                        @if ($subscriber->banned_at == null)
                                                            <i class="ti-check" title="@__('Active')"></i>
                                                        @else
                                                            <i class="ti-check" title="@__('Inactive')"></i>
                                                        @endif
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
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
