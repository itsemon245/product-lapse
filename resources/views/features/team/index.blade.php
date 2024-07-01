@extends('layouts.subscriber.app', ['title' => @__('feature/team.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/team.title'), 'route' => route('team.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>

            <form method="GET" hx-get="{{ route('team.index') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="email">
                <input type="hidden" name="columns[]" value="first_name">
                <input type="hidden" name="columns[]" value="last_name">
                <input type="hidden" name="model" value="productUser">
                <input type="search" name="search" class="form-control widget_input"
                    placeholder="{{ __('feature/team.search') }}" hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>


        <x-slot:actions>
            @can('add member')
                <x-button type="link" href="{{ route('team.create') }}">
                    <i class="ti-plus"></i>
                    @__('feature/team.add')
                </x-button>
            @endcan
        </x-slot:actions>

        <x-slot:filter>
            {{-- Empty --}}
        </x-slot:filter>


        <x-slot:list>
            @forelse ($teams as $team)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <figure><a href="#"><img src="{{ $team->image->url ?? asset('img/logo.png') }}"
                                        alt=""></a></figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4 class="mb-0"><a href="#"
                                                class="f_500 t_color3"></a>{{ $team->name ?? 'Name' }}</h4>
                                        <p class="mb-0 p-0 h-auto text-green-500">
                                            {{ $team->email ?? $team->mainAccount->email }}</p>
                                        <ul class="list-unstyled">
                                            <li class="text-capitalize">
                                                {{ $team?->getRole()?->name ? str($team?->getRole()?->name)->title() : 'Guest' }}
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            @if (auth()->id() != $team->id && auth()->user()->owner_id != $team->id)
                                                @can('delete member')
                                                    <div class="like-btn">
                                                        <form action="{{ route('team.destroy', $team) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <x-button :hasIcon="true" type="submit"><i
                                                                    class='ti-trash'></i></x-button>
                                                        </form>
                                                    </div>
                                                @endcan
                                                @can('update member')
                                                    <div class="like-btn">
                                                        <a href="{{ route('team.edit', $team) }}" class="shortlist"
                                                            title="Edit">
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                    </div>
                                                @endcan
                                            @endif
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
            {!! $teams->links() !!}
        </x-slot:pagination>
    </x-feature.index>
@endsection
