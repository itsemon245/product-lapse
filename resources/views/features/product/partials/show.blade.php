@extends('layouts.subscriber.app', ['title' => @__('feature/product.info.title')])
@section('main')
    <x-feature.show>
        <x-slot:breadcrumb>
            <x-breadcrumb :list="[['label' => @__('feature/product.info.title'), 'route' => route('product.info', $data->id)]]" />
        </x-slot:breadcrumb>


        <x-slot:details>
            <div class="col-lg-6 blog_sidebar_left">
                <div class="blog_single mb_50">
                    <div class="">
                        <div class="flex items-center">
                            <h5 class="f_size_20 f_500">{{ $data->name }}</h5>
                            @can('update product')
                                <x-button type="link" class="ml-4" :href="route('product.edit', $data)" :has-icon="true">
                                    <span class="ti-pencil"></span>
                                </x-button>
                            @endcan
                        </div>
                        <div class="entry_post_info">
                            {{ \Carbon\Carbon::parse($data->created_at)->format('l, j F Y') }}
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="title2">@__('feature/product.info.category')</h6>
                                <p class="f_400 mb-30 text-font">
                                    {{ $data->category }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="title2">@__('feature/product.info.url')</h6>
                                <p class="f_400 mb-30 text-font">
                                    {{ $data->url }}
                                </p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="title2">@__('feature/product.info.stage')</h6>
                                <p class="f_400 mb-30 text-font">
                                    {{ $data->stage }}
                                </p>
                            </div>
                        </div>
                        <h6 class="title2">@__('feature/product.info.description')</h6>
                        <p class="f_400 mb-30 text-font">
                            {{ $data->description }}
                        </p>
                    </div>
                </div>

            </div>
        </x-slot:details>
        <x-slot:profile>
            <div class="col-lg-3">
                <div class="blog-sidebar box-sidebar">
                    <div class="widget sidebar_widget widget_recent_post mt_60">
                        <div class="media post_author mt_60">
                            <img class="rounded-circle" src="{{ favicon($data->creator->image) }}" alt="">
                            <div class="media-body">
                                <h5 class=" t_color3 f_size_18 f_500">{{ $data->creator->name }}</h5>
                            </div>
                        </div>
                        {{-- <h6 class="title2">@__('feature/product.info.created'): <span class="f_400 mb-30 text-font">{{ $owner->name }}</span></h6> --}}
                    </div>

                </div>

            </div>
            <div class="col-lg-3">
                <div class="mt-5 pt-2">
                    <img src="{{ $data->image?->url }}" alt="">
                </div>

            </div>
        </x-slot:profile>
        {{-- <x-comments :model="$product" :comments="$product->comments" /> --}}
    </x-feature.show>
@endsection
