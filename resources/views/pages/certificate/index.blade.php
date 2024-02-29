@extends('layouts.admin.app', ['title'=> @__('feature/certificate.title')])
@section('main')
<x-feature.index>
    <x-slot:breadcrumb>
        <x-breadcrumb :list="[
            ['label' => @__('feature/certificate.title'), 'route' => route('certificate.index')],
            ]" />
    </x-slot:breadcrumb>

    <x-slot:search>
        <form method="GET" hx-get="{{ route('search.certificate') }}" hx-trigger="submit" hx-target="#search-results" hx-select="#search-results" class="search-form input-group">
            <input type="hidden" name="columns[]" value="name">
            <input type="hidden" name="columns[]" value="status">
            <input type="hidden" name="model" value="certificate">
            <input type="search" name="search" class="form-control widget_input" placeholder="Search certificate" hx-vals="#search-results">
            <button type="submit"><i class="ti-search"></i></button>
    </x-slot:search>


    <x-slot:actions>
        {{--  --}}
    </x-slot:actions>

    <x-slot:filter>
        <h5>Status</h5>
        <x-filter :route="route('search.certificate')" :columns="['status']" model="certificate" :options="$statuses" />
    </x-slot:filter>


    <x-slot:list>
        @forelse ($certificates as $certificate)
        @php
            $user = App\Models\User::with('image')->find($certificate->achieved_id);
        @endphp
        <div class="col-md-6">
            <div class="item lon new">
                <div class="list_item">
                    <figure><a href="#"><img src="{{ $user->image->url ?? asset('img/p6.png') }}" alt=""></a></figure>
                    <div class="joblisting_text">
                        <div class="job_list_table">
                            <div class="jobsearch-table-cell">
                                <h4><a href="#" class="f_500 t_color3">{{ $certificate->name }}</a></h4>
                                <ul class="list-unstyled">
                                    <li class="{{ $certificate->status == 2 ? 'text-danger' : 'text-success' }}">{{ $certificate->status == 2 ? 'Not Approved' : 'Approved'}}</li>
                                    {{-- <li>{{ $certificate->created_at->formatLocalized('%A %d %B %Y') }}</li> --}}
                                    <li>{{ $certificate->company }}</li>
                                </ul>
                            </div>
                            <div class="jobsearch-table-cell">
                                <div class="jobsearch-job-userlist d-flex">
                                    <div class="like-btn">
                                        <form action="{{ route('certificate.approval', $certificate) }}" method="POST">
                                            @csrf
                                            <x-btn-icons type="submit" class="btn" value="<i title='Approve' class='ti-check-box'></i>" />
                                        </form>
                                    </div>
                                    <div class="like-btn">
                                        <form action="{{ route('certificate.cancel', $certificate) }}" method="POST">
                                            @csrf
                                            <x-btn-icons type="submit" class="btn {{ $certificate->status == 1 ? 'd-none' : '' }}" value="<i title='Reject' class='ti-close'></i>" />
                                        </form>
                                    </div>
                                    <div class="like-btn">
                                        <x-button type="delete" :action="route('certificate.destroy', $certificate)" title="Delete" :has-icon="true">
                                            <span title="Delete" class="ti-trash"></span>
                                        </x-button>
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