@extends('layouts.admin.app', ['title'=> @__('feature/certificate.title')])
@section('main')
<x-feature.index>
    <x-slot:breadcrumb>
        <x-breadcrumb :list="[
            ['label' => @__('feature/certificate.title'), 'route' => route('certificate.index')],
            ]" />
    </x-slot:breadcrumb>

    <x-slot:search>
        <form action="#" class="search-form input-group">
            <input type="searproductch" class="form-control widget_input" placeholder="{{ __('feature/certificate.search') }}">
            <button type="submit"><i class="ti-search"></i></button>
        </form>
    </x-slot:search>


    <x-slot:actions>
        {{--  --}}
    </x-slot:actions>

    <x-slot:filter>
    {{-- Empty --}}
    </x-slot:filter>


    <x-slot:list>
        @forelse ($certificates as $certificate)
        <div class="col-md-6">
            <div class="item lon new">
                <div class="list_item">
                    <div class="joblisting_text">
                        <div class="job_list_table">
                            <div class="jobsearch-table-cell">
                                <h4><a href="{{ route('certificate.show', $certificate) }}" class="f_500 t_color3">{{ $certificate->name }}</a></h4>
                                <ul class="list-unstyled">
                                    <li class="{{ $certificate->approved_id == null ? 'text-danger' : 'text-success' }}">{{ $certificate->approved_id == null ? 'Not Approved' : 'Approved'}}</li>
                                    <li>{{ $certificate->created_at->formatLocalized('%A %d %B %Y') }}</li>
                                    <li>{{ $certificate->company }}</li>
                                </ul>
                            </div>
                            <div class="jobsearch-table-cell">
                                <div class="jobsearch-job-userlist">
                                    <div class="like-btn">
                                        <form action="{{ route('certificate.destroy', $certificate) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <x-btn-icons type="submit" class="btn" value="<i class='ti-trash'></i>" />
                                        </form>
                                    </div>
                                    <div class="like-btn">
                                        <form action="{{ route('certificate.approval', $certificate) }}" method="POST">
                                            @csrf
                                  
                                            <x-btn-icons type="submit" class="btn" value="<i class='ti-check'></i>" />
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
        <div class="col-md-12 row" style="height: 40vh;">
            <div class="col-md-4"></div>
            <div class="col-md-4"><img src="{{ asset('img/not-found.png') }}" alt=""></div>
            <div class="col-md-4"></div>

        </div>
    @endforelse
    </x-slot:list>
</x-feature.index>
@endsection 