@extends('layouts.feature.index', ['title' => @__('feature/support.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/support.title'), 'route' => route('support.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>
            <form action="#" class="search-form input-group">
                <input type="search" class="form-control widget_input" placeholder="{{ __('feature/support.search') }}">
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
            <form method="get" action="#">
                <select class="selectpickers selectpickers2" style="display: none;">
                    <option value="">All</option>
                    <option value="">working on</option>
                    <option value="">panding</option>
                    <option value="">stopped</option>
                </select>
                <div class="nice-select selectpickers selectpickers2" tabindex="0"><span class="current">All</span>
                    <ul class="list">
                        <li data-value="" class="option selected focus">All</li>
                        <li data-value="" class="option">working on</li>
                        <li data-value="" class="option">panding</li>
                        <li data-value="" class="option">stopped</li>
                    </ul>
                </div>
            </form>
        </x-slot:filter>

        <x-slot:list>
            @foreach ($supports as $support)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <figure><a href="#"><img src="img/p6.png" alt=""></a></figure>
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
            @endforeach
        </x-slot:list>

    </x-feature.index>
@endsection
