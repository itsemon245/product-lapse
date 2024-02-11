@extends('layouts.admin.app', ['title' => 'Feature'])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Features', 'route' => route('features.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>
            <form action="#" class="search-form input-group">
                <input type="searproductch" class="form-control widget_input" placeholder="Search Feature">
                <button type="submit"><i class="ti-search"></i></button>
            </form>

        </x-slot:search>

        <x-slot:actions>
            <x-button type="link" href="{{ route('features.create') }}">
                <i class="ti-plus"></i>
                Add Feature
            </x-button>
        </x-slot:actions>
        <x-slot:filter>

        </x-slot:filter>

        <x-slot:list>
            @foreach ($features as $feature)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <figure>
                                        <img src="{{ asset($feature->image) }}" alt="">
                                    </figure>
                                    <div class="jobsearch-table-cell">
                                        <h4>
                                            (En)
                                            -{{ $feature->title->en }} <br>
                                            (Ar)-{{ $feature->title->ar }}
                                        </h4>
                                        <h6>
                                            (En)-{{ $feature->caption->en }} <br>
                                            (Ar)-{{ $feature->caption->ar }}
                                        </h6>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <form action="{{ route('features.destroy', $feature) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="shortlist" title="Delete">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                            <div class="like-btn">
                                                <a href="{{ route('features.edit', $feature) }}" class="shortlist"
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
