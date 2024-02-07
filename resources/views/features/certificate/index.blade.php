@extends('layouts.subscriber.app', ['title'=> @__('feature/certificate.title')])
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
        <x-button type="link" href="{{ route('certificate.create') }}" > 
            <i class="ti-plus"></i>
            @__('feature/certificate.add')
        </x-button>   
    </x-slot:actions>

    <x-slot:filter>
    {{-- Empty --}}
    </x-slot:filter>


    <x-slot:list>
        @foreach ($certificates as $certificate)
        <div class="col-md-6">
            <div class="item lon new">
                <div class="list_item">
                    <div class="joblisting_text">
                        <div class="job_list_table">
                            <div class="jobsearch-table-cell">
                                <h4><a href="{{ route('certificate.show', $certificate) }}" class="f_500 t_color3">{{ $certificate->name }}</a></h4>
                                <ul class="list-unstyled">
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