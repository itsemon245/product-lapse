@extends('layouts.admin.app', ['title' => 'Users Management'])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Users Management', 'route' => route('users.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            <form method="GET" hx-get="{{ route('users.search') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="name">
                <input type="hidden" name="model" value="user">
                <input type="search" name="search" class="form-control widget_input" placeholder="Search user"
                    hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>


        <x-slot:actions>
            {{--  --}}
        </x-slot:actions>

        <x-slot:filter>
            {{-- <h5>Status</h5>
        <x-filter :route="route('search.certificate')" :columns="['status']" model="certificate" :options="$statuses" /> --}}
        </x-slot:filter>


        <x-slot:list>
            @forelse ($orders as $order)
            @php
                $user = App\Models\User::with('image')->where('id', $order->user->id)->first();
            @endphp
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item ">
                            <figure class="align-middle"><a href="#"><img src="{{ $user->image->url ?? favicon() }}"
                                        alt=""></a></figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell !w-full">
                                        <h4><a href="{{ route('users.show', $order) }}"
                                                class="f_500 t_color3">{{ $order->package->name->{app()->getLocale()} }}</a>
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li> Status: <span class="p_color4">{{ $order->status }}</span> </li>
                                            <li> Amount: <span class="p_color4">{{ $order->amount }}</span> </li>
                                            <li class="">
                                                {{ \Carbon\Carbon::parse($order->created_at)->format('l, j F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell !w-full">
                                        <div class="jobsearch-job-userlist !float-start">
                                            <form action="{{ route('admin.order.approve', $order) }}" method="post"
                                                class="like-btn">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="{{ $order->status == 'pending' ? '' : 'd-none' }}" {{ $order->status == 'pending' ? '' : 'disabled' }} >
                                                    <i class="ti-check" title="@__('Ban')"></i>

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
