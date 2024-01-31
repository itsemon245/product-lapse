@extends('layouts.feature.index', ['title' => @__('feature/document.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/document.title'), 'route' => route('document.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            <form action="#" class="search-form input-group">
                <input type="searproductch" class="form-control widget_input"
                    placeholder="{{ __('feature/document.search') }}">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>


        <x-slot:actions>
            <x-button type="link" href="{{ route('document.create') }}">
                <i class="ti-plus"></i>
                @__('feature/document.add')
            </x-button>
        </x-slot:actions>

        <x-slot:filter>
            <h5>@__('feature/document.showing')</h5>
            <form method="get" action="#">
                <select class="selectpickers selectpickers2" style="display: none;">
                    <option value="">All</option>
                    <option value="">Durable product</option>
                    <option value="">Initial idea</option>
                    <option value="">Stopped</option>
                </select>
                <div class="nice-select selectpickers selectpickers2" tabindex="0"><span class="current">All</span>
                    <ul class="list">
                        <li data-value="" class="option selected focus">All</li>
                        <li data-value="" class="option">Durable product</li>
                        <li data-value="" class="option">Initial idea</li>
                        <li data-value="" class="option">Stopped</li>
                    </ul>
                </div>
            </form>
        </x-slot:filter>


        <x-slot:list>
            @foreach ($documents as $document)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('document.show', $document) }}"
                                                class="f_500 t_color3">{{ $document->name }}</a>
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li>
                                                {{ $document->type }}
                                            <li>
                                                {{ \Carbon\Carbon::parse($document->date)->format('l, j F Y') }}
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <form action="{{ route('document.destroy', $document) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-btn-icons type="submit" class="btn"
                                                        value="<i class='ti-trash'></i>" />
                                                </form>
                                            </div>
                                            <div class="like-btn">
                                                <x-btn-icons type="anchor" value="<i class='ti-pencil'></i>"
                                                    href="{{ route('document.edit', $document) }}" />
                                            </div>
                                            <div class="like-btn">
                                                <form
                                                    action="{{ route('document.download', ['id' => base64_encode($document->id)]) }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @csrf
                                                    <button type="submit" class="btn">
                                                        <i class="ti-download"></i>
                                                    </button>
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
