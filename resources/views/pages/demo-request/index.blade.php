@extends('layouts.admin.app', ['title' => __('Demo Requests')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => __('Demo Requests'), 'route' => route('users.index')]]" />
        </x-slot:breadcrumb>

        <x-slot:search>
            {{-- <form method="GET" hx-get="{{ route('users.search') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="name">
                <input type="hidden" name="model" value="user">
                <input type="search" name="search" class="form-control widget_input" placeholder="{{ __('Search demoRequest') }}"
                    hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form> --}}
        </x-slot:search>


        <x-slot:actions>
            {{--  --}}
        </x-slot:actions>

        <x-slot:filter>
            {{-- <form method="get" action="{{ route('admin.order.index') }}">
                <select onchange="this.form.submit()" name="search" class="selectpickers selectpickers2">
                    <option value="">@__('All')</option>
                    @forelse ($options as $opt)
                        @if ($opt->value != 'draft')
                            <option value="{{ $opt->value }}" @selected(request()->query('search') == $opt->value)>
                                {{ __($opt->name) }}
                            </option>
                        @endif
                    @empty
                        <option>@__('filter.no-items')</option>
                    @endforelse
                </select>

            </form> --}}
        </x-slot:filter>


        <x-slot:list>
            @forelse ($demoRequests as $demoRequest)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item flex items-center">

                            <figure class="my-auto"><a href="#"><img src="{{ favicon() }}" alt=""></a>
                            </figure>
                            <div class="">
                                <div class="flex items-center gap-3">
                                    <div class="!w-full">
                                        <a href="#" class="f_500 t_color3">
                                            <h4 class="mb-1">
                                                {{ $demoRequest->full_name }}
                                            </h4>
                                        </a>
                                        <div class="flex gap-3 flex-wrap">
                                            <div class="!text-primary flex-grow w-full">{{ $demoRequest->official_email }}
                                            </div>
                                            <div class="text-success">{{ $demoRequest->mobile_number }}</div>
                                            <div class="text-gray-300">|</div>
                                            <div class="text-info">{{ $demoRequest->company_name }}</div>
                                        </div>
                                    </div>
                                    <div class="">

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
    </x-feature.index>
@endsection
@push('scripts')
@endpush
