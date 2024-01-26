@extends('layouts.feature.index', ['title'=> @__('feature/team.title')])
@section('main')
<x-feature.index>
    <x-slot:breadcrumb>
        <x-breadcrumb :list="[
            ['label' => @__('feature/team.title'), 'route' => route('report.index')],
            ]" />
    </x-slot:breadcrumb>

    <x-slot:search>
        <form action="#" class="search-form input-group">
            <input type="searproductch" class="form-control widget_input" placeholder="{{ __('feature/team.search') }}">
            <button type="submit"><i class="ti-search"></i></button>
        </form>
    </x-slot:search>


    <x-slot:actions>
        <x-button type="link" href="{{ route('team.create') }}" > 
            <i class="ti-plus"></i>
            @__('feature/team.add')
        </x-button>   
    </x-slot:actions>

    <x-slot:filter>
        {{-- Empty --}}
    </x-slot:filter>


    <x-slot:list>
        @foreach ($teams as $team)
        <div class="col-md-6">
            <div class="item lon new">
                <div class="list_item">
                    <figure><a href="#"><img src="img/profile2.png" alt=""></a></figure>
                    <div class="joblisting_text">
                        <div class="job_list_table">
                            <div class="jobsearch-table-cell">
                                <h4><a href="#" class="f_500 t_color3">Ahmed Mahmoud</a></h4>
                                <ul class="list-unstyled">
                                    <li>Graphic designer</li>
                                </ul>
                            </div>
                            <div class="jobsearch-table-cell">
                                <div class="jobsearch-job-userlist">
                                    <div class="like-btn">
                                        <a href="javascript:void(0);" class="shortlist" title="Delete"> <i class="ti-trash"></i> </a>
                                    </div>
                                    <div class="like-btn">
                                        <a href="javascript:void(0);" class="shortlist" title="Edit"> <i class="ti-pencil"></i> </a>
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