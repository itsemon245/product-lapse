@extends('layouts.subscriber.app', ['title'=> @__('feature/team.title')])
@section('main')
<x-feature.index>
    <x-slot:breadcrumb>
        <x-breadcrumb :list="[
            ['label' => @__('feature/team.title'), 'route' => route('team.index')],
            ]" />
    </x-slot:breadcrumb>

    <x-slot:search>

    <form method="GET" hx-get="{{ route('team.search') }}" hx-trigger="submit" hx-target="#search-results" hx-select="#search-results" class="search-form input-group">
        <input type="hidden" name="columns[]" value="email">
        <input type="hidden" name="columns[]" value="first_name">
        <input type="hidden" name="model" value="invitation">
        <input type="search" name="search" class="form-control widget_input" placeholder="{{ __('feature/team.search') }}" hx-vals="#search-results">
        <button type="submit"><i class="ti-search"></i></button>
    </form>
    </x-slot:search>


    <x-slot:actions>
        <x-button type="link" href="{{ route('team.create') }}" > 
            <i class="ti-plus"></i>
            @__('feature/team.add')
        </x-button>   
    </x-slot:actions>

    <x-slot:filter>
        {{-- Empty --}}
    </x-slot:filter>


    <x-slot:list>
        @forelse ($teams as $team)
        @php
            $user = App\Models\User::with('image')->find($team->user_id);
        @endphp
        {{-- {{ dd($user) }} --}}
        <div class="col-md-6">
            <div class="item lon new">
                <div class="list_item">
                    <figure><a href="#"><img src="{{ $user->image->url ?? asset('img/p1.jpg') }}" alt=""></a></figure>
                    <div class="joblisting_text">
                        <div class="job_list_table">
                            <div class="jobsearch-table-cell">
                                <h4><a href="#" class="f_500 t_color3"></a>{{ $user->name ?? 'Name' }}</h4>
                                <ul class="list-unstyled">
                                    <li>{{ $user->created_at == !null ? 'Accept' : 'Pending' }}</li> 
                                </ul>
                            </div>
                            <div class="jobsearch-table-cell">
                                <div class="jobsearch-job-userlist">
                                    <div class="like-btn">
                                        <form action="{{ route('team.destroy', $team) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-btn-icons type="submit" value="<i class='ti-trash'></i>" />
                                        </form>
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