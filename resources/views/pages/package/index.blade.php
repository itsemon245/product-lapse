@extends('layouts.admin.app', ['title' => __('Packages')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Packages'), 'route' => route('package.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            <form action="#" class="search-form input-group">
                <input type="searproductch" class="form-control widget_input" placeholder="@__('Search packages')">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>


        <x-slot:actions>
            <x-button type="link" href="{{ route('package.create') }}">
                <i class="ti-plus"></i>
                @__('Add package')
            </x-button>
        </x-slot:actions>

        <x-slot:filter>
            {{--  --}}
        </x-slot:filter>


        <x-slot:list>
            @foreach ($packages as $package)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <figure><a href="{{route('package.edit', $package)}}"><img src="{{ favicon() }}"
                                        alt=""></a></figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{route('package.edit', $package)}}" class="f_500 t_color3">
                                                {{ $package->name->en }} <span>|</span> {{ $package->name->ar }}
                                            </a></h4>
                                        <ul class="list-unstyled">
                                            @if ($package->limited_feature)
                                                <li class="p_color1">@__('Limited Features')</li>
                                            @endif
                                            @if ($package->is_popular)
                                                <li class="p_color1">@__('Popular')</li>
                                            @endif
                                            <li class="!border-l-0 !pl-0">@__('Active Feature'); {{$package->activeFeatures->count()}}</li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist flex items-center flex-row-reverse">
                                            <div class="like-btn">
                                                <x-button type="delete" :action="route('package.destroy', $package)" :has-icon="true">
                                                    <span class="ti-trash"></span>
                                                </x-button>
                                            </div>
                                            <div class="like-btn">
                                                <x-button type="link" :has-icon="true"
                                                    href="{{ route('package.edit', $package) }}">
                                                    <i class='ti-pencil'></i>
                                                </x-button>
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
