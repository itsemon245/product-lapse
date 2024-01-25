@extends('layouts.feature.index', ['title' => @__('feature/release.title')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/release.title'), 'route' => route('release.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            <form action="#" class="search-form input-group">
                <input type="searproductch" class="form-control widget_input" placeholder="{{ __('feature/release.search') }}">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>


        <x-slot:actions>
            <x-button type="link" href="{{ route('release.create') }}" >
                <i class="ti-plus"></i>
               @__('feature/release.add')
            </x-button>
        </x-slot:actions>

        <x-slot:filter>
        {{-- Empty --}}
        </x-slot:filter>


        <x-slot:list>
            @foreach ($releases as $release)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">

                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('release.show', ['release' => base64_encode($release->id)]) }}"
                                                class="f_500 t_color3">{{ $release->name }}</a></h4>
                                        <ul class="list-unstyled">
                                            <li class="p_color1">{{ $release->version }}</li>
                                            <li>More text about product</li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <form action="{{ route('release.destroy', base64_encode($release->id)) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-btn-icons type="submit" class="btn"
                                                        value="<i class='ti-trash'></i>" />
                                                </form>
                                            </div>
                                            <div class="like-btn">
                                                <x-btn-icons type="anchor" value="<i class='ti-pencil'></i>"
                                                    href="{{ route('release.edit', base64_encode($release->id)) }}" />
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
