@extends('layouts.subscriber.app', ['title' => @__('feature/product.add')])
@section('main')
    <x-feature.index>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/product.add'), 'route' => route('product.index')]]" />
        </x-slot:breadcrumb>
        <x-slot:search>
            <form method="GET" hx-get="{{ route('product.search') }}" hx-trigger="submit" hx-target="#search-results"
                hx-select="#search-results" class="search-form input-group">
                <input type="hidden" name="columns[]" value="name">
                <input type="hidden" name="columns[]" value="stage">
                <input type="hidden" name="model" value="product">
                <input type="search" name="search" class="form-control widget_input"
                    placeholder="{{ __('feature/product.search') }}" hx-vals="#search-results">
                <button type="submit"><i class="ti-search"></i></button>
            </form>
        </x-slot:search>

        <x-slot:actions>
            <x-button type="link" href="{{ route('product.create') }}">
                <i class="ti-plus"></i>
                @__('feature/product.add')
            </x-button>
        </x-slot:actions>
        <x-slot:filter>
            <h5>@__('feature/product.showing')</h5>
            <x-filter :route="route('product.search')" :columns="['category']" model="product" :options="$categories" />
        </x-slot:filter>

        <x-slot:list>
            @forelse ($products as $product)
                <div class="col-md-6">
                    <div class="item lon new">
                        <div class="list_item">
                            <figure>
                                <a href="{{ route('product.show', $product) }}">
                                    <img src="{{ $product->image?->url ?? asset('img/logo.png') }}" alt="">
                                </a>
                            </figure>
                            <div class="joblisting_text">
                                <div class="job_list_table">
                                    <div class="jobsearch-table-cell">
                                        <h4><a href="{{ route('product.show', $product) }}"
                                                class="f_500 t_color3">{{ $product->name }}</a></h4>
                                        <ul class="list-unstyled">
                                            <li class="p_color1">{{ $product->category }}</li>
                                            <li>{{ str($product->description)->limit(12) }}</li>
                                        </ul>
                                    </div>
                                    <div class="jobsearch-table-cell">
                                        <div class="jobsearch-job-userlist">
                                            <div class="like-btn flex items-center">
                                                <x-button type="link" class="mt-1" :href="route('product.edit', $product)" :has-icon="true">
                                                    <span class="ti-pencil"></span>
                                                </x-button>
                                                <x-button type="delete" :action="route('product.destroy', $product)" :has-icon="true">
                                                    <span class="ti-trash"></span>
                                                </x-button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 row" style="height: 40vh;">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><img src="{{ asset('img/not-found.png') }}" alt=""></div>
                    <div class="col-md-4"></div>

                </div>
            @endforelse

        </x-slot:list>
        <x-slot:pagination>
            {!! $products->links() !!}
        </x-slot:pagination>

    </x-feature.index>
@endsection
