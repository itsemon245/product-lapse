@extends('layouts.subscriber.app', ['title' => @__('feature/document.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/document.title'), 'route' => route('document.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            <form method="GET" hx-get="{{ route('document.search') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="name">
                <input type="hidden" name="columns[]" value="type">
                <input type="hidden" name="model" value="document">
                <input type="search" name="search" class="form-control widget_input"
                    placeholder="{{ __('feature/document.search') }}" hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>


        <x-slot:actions>
            @can('create document')
                <x-button type="link" href="{{ route('document.create') }}">
                    <i class="ti-plus"></i>
                    @__('feature/document.add')
                </x-button>
            @endcan
        </x-slot:actions>

        <x-slot:filter>
            <h5>@__('feature/document.showing')</h5>
            <x-filter :route="route('document.search')" :columns="['type']" model="document" :options="$types" />
        </x-slot:filter>


        <x-slot:list>
            @forelse ($documents as $document)
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
                                            <li class="text-muted">
                                                {{ \Carbon\Carbon::parse($document->date)->format('l, j F Y') }}
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            @can('delete document')
                                                <div class="like-btn">
                                                    <x-button type="delete" :action="route('document.destroy', $document)" :has-icon="true">
                                                        <span class="ti-trash"></span>
                                                    </x-button>
                                                </div>
                                            @endcan

                                            @can('update document')
                                                <div class="like-btn">
                                                    <x-btn-icons type="anchor" value="<i class='ti-pencil'></i>"
                                                        href="{{ route('document.edit', $document) }}" />
                                                </div>
                                            @endcan

                                            @if ($document->file)
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
            {!! $documents->links() !!}
        </x-slot:pagination>
    </x-feature.index>
@endsection
