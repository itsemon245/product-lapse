@extends('layouts.admin.app', ['title' => 'Package'])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => 'Package', 'route' => route('package.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            <form action="#" class="search-form input-group">
                <input type="searproductch" class="form-control widget_input" placeholder="Search packages">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>


        <x-slot:actions>
            <x-button type="link" href="{{ route('package.create') }}">
                <i class="ti-plus"></i>
                Add package
            </x-button>
        </x-slot:actions>

        <x-slot:filter>
            {{-- <h5>Showing packages</h5>
        <form method="get" action="#">
            <select class="selectpickers selectpickers2" style="display: none;">
                <option value="">All</option>
                <option value="">Durable product</option>
                <option value="">Initial idea</option>
                <option value="">Stopped</option>
            </select><div class="nice-select selectpickers selectpickers2" tabindex="0"><span class="current">All</span><ul class="list"><li data-value="" class="option selected focus">All</li><li data-value="" class="option">Durable product</li><li data-value="" class="option">Initial idea</li><li data-value="" class="option">Stopped</li></ul></div>
        </form> --}}
        </x-slot:filter>


        <x-slot:list>
            @foreach ($packages as $package)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <figure><a href="{{ route('package.show', $package) }}"><img src="{{ favicon() }}"
                                        alt=""></a></figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('package.show', $package) }}" class="f_500 t_color3">
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
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <form action="{{ route('package.destroy', $package) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <x-btn-icons type="submit" class="btn"
                                                        value="<i class='ti-trash'></i>" />
                                                </form>
                                            </div>
                                            <div class="like-btn">
                                                <x-btn-icons type="anchor" value="<i class='ti-pencil'></i>"
                                                    href="{{ route('package.edit', $package) }}" />
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
