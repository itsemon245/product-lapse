@extends('layouts.admin.app', ['title' => 'FAQs'])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'FAQs', 'route' => route('faqs.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>
            <form action="#" class="search-form input-group">
                <input type="searproductch" class="form-control widget_input" placeholder="Search Faq">
                <button type="submit"><i class="ti-search"></i></button>
            </form>

        </x-slot:search>

        <x-slot:actions>
            <x-button type="link" href="{{ route('faqs.create') }}">
                <i class="ti-plus"></i>
                Add FAQ
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
                                            -{{ $faq->question->en }} <br>
                                            (Ar)-{{ $faq->question->ar }}
                                        </h5>
                                        <h6>
                                            (En)-{{ $faq->answer->en }} <br>
                                            (Ar)-{{ $faq->answer->ar }}
                                        </h6>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <form action="{{ route('faqs.destroy', $faq) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="shortlist" title="Delete">
                                                        <i class="ti-trash"></i>
                                                    </button>
                                                </form>

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
