@extends('layouts.admin.app')
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Package Feature'), 'route' => route('package-feature.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>


            <form method="GET" hx-get="{{ route('package-feature.search') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="name">
                <input type="hidden" name="model" value="PackageFeature">
                <input type="search" name="search" class="form-control widget_input"
                    placeholder="{{ __('Search Feature') }}" hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>

        <x-slot:actions>
            <form class="login-form sign-in-form" action="{{ route('package-feature.store') }}" method="post">
                @csrf
                <x-modal id="modal-create" title="{{ __('Add Package Feature') }}">
                    <x-slot:trigger>
                        <x-button type="button" data-toggle="modal" data-target="#modal-create">
                            <i class="ti-plus"></i>
                            @__('Add Package Feature')
                        </x-button>
                    </x-slot:trigger>

                    <div class="form-group text_box col-lg-12">
                        <x-input label="{{ __('Name (en)') }}" name="name[en]"
                            placeholder="{{ __('Name (en)') }}">
                        </x-input>
                    </div>
                    <div class="form-group text_box col-lg-12">
                        <x-input label="{{ __('Name (ar)') }}" name="name[ar]"
                            placeholder="{{ __('Name (ar)') }}">
                        </x-input>
                    </div>
                    <x-slot:footer>
                        <!-- Modal Header -->
                        <button type="submit" class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">{{ __('Add') }}</button>
                        <button type="button" class="btn_hover agency_banner_btn btn-bg btn-bg-grey"
                            data-dismiss="modal">{{ __('Cancel') }}</button>
                    </x-slot:footer>
                </x-modal>
            </form>
        </x-slot:actions>
        {{-- 
    <x-slot:filter>
        <h5>@__('feature/task.showing2')</h5>
        <x-filter :route="route('task.search')" :columns="['status']" model="task" :options="$priorities" />
    </x-slot:filter> --}}

        <x-slot:list>
            @forelse ($packageFeatures as $packageFeature)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <figure><a href="#"><img src="{{ favicon() }}" alt=""></a></figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4>
                                            <span>{{ $packageFeature->name->en }}</span> | <span>{{ $packageFeature->name->ar }}</span>
                                        </h4>
                                        <ul class="list-unstyled">
                                            <li class="text-muted">
                                                {{ \Carbon\Carbon::parse($packageFeature->created_at)->format('l, j F Y') }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn">
                                                <x-button type="delete" :action="route('package-feature.destroy', $packageFeature)" :has-icon="true">
                                                    <span class="ti-trash"></span>
                                                </x-button>
                                            </div>
                                            <div class="like-btn">
                                                <form class="login-form sign-in-form"
                                                    action="{{ route('package-feature.update', $packageFeature) }}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <x-modal id="modal-edit" title="@__("Update Package Feature")">
                                                        <x-slot:trigger>
                                                            <button type="button" class="shortlist" title="Edit"
                                                                data-toggle="modal" data-target="#modal-edit">
                                                                <i class="ti-pencil"></i>
                                                            </button>

                                                        </x-slot:trigger>

                                                        <div class="form-group text_box col-lg-12">
                                                            <x-input :value="$packageFeature->name?->en" label="@__("Name(en)")" name="name[en]"
                                                                placeholder="name">
                                                            </x-input>
                                                        </div>
                                                        <div class="form-group text_box col-lg-12">
                                                            <x-input :value="$packageFeature->name?->ar" label="@__("Name(ar)")" name="name[ar]"
                                                                placeholder="name">
                                                            </x-input>
                                                        </div>
                                                        <x-slot:footer>
                                                            <!-- Modal Header -->
                                                            <button type="submit"
                                                                class="btn_hover agency_banner_btn btn-bg agency_banner_btn2">@__("Update")</button>
                                                            <button type="button"
                                                                class="btn_hover agency_banner_btn btn-bg btn-bg-grey"
                                                                data-dismiss="modal">@__('Cancel')</button>
                                                        </x-slot:footer>
                                                    </x-modal>
                                                </form>

                                            </div>
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
            {!! $packageFeatures->links() !!}
        </x-slot:pagination>
    </x-feature.index>
@endsection
