@extends('layouts.admin.app', ['title' => __('FAQs')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('FAQs'), 'route' => route('faqs.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>
            <form action="#" class="search-form input-group">
                <input type="searproductch" class="form-control widget_input" placeholder="{{ __('Search Faq') }}">
                <button type="submit"><i class="ti-search"></i></button>
            </form>

        </x-slot:search>

        <x-slot:actions>
            <x-button type="link" href="{{ route('faqs.create') }}">
                <i class="ti-plus"></i>
                {{ __('Add FAQ') }}
            </x-button>
        </x-slot:actions>
        <x-slot:filter>

        </x-slot:filter>

        <x-slot:list>
            @foreach ($faqs as $faq)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h5>
                                            (En)
                                            -{{ $faq->question->en }}
                                            <span><p class="text-muted">(Ar)-{{ $faq->question->ar }}</p></span>
                                        </h5>
                                        
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <x-button type="delete" :action="route('faqs.destroy', $faq)" :has-icon="true">
                                                    <span class="ti-trash"></span>
                                                </x-button>
                                            </div>
                                            <div class="like-btn">
                                                <a href="{{ route('faqs.edit', $faq) }}" class="shortlist" title="Edit">
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
