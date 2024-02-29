@extends('layouts.frontend.app')


@section('main')
    <x-breadcrumb :list="[
        [
            'label' => __('Packages'),
            'route' => route('package.compare'),
        ],
    ]">

    </x-breadcrumb>
    <section class="pricing_area sec_pad" id="tolink-4">
        <div class="container custom_container p0">
            <div class="sec_title text-center">
                <h2 class="f_size_30 l_height50 f_700 t_color2 wow fadeInUp" data-wow-delay="0.2s">@lang('welcome.packages')
                </h2>
            </div>
            <div class="price_content">
                <div class="row wow fadeInUp" data-wow-delay="0.3s">
                    @foreach ($packages as $package)
                        <div class="col-lg-3 col-6">
                            <div class="price_item">
                                @if ($package?->is_popular)
                                    <div class="tag"><span>@lang('welcome.popular')</span></div>
                                @endif
                                <h5 class="f_size_20 f_600 t_color2 mt_30"> {{ $package?->name?->{app()->getLocale()} }}
                                </h5>
                                <div class="price f_700 f_size_40 t_color2">{{ $package?->price }}<sub
                                        class="f_size_16 f_400"> @lang('welcome.price')</sub>
                                </div>
                                <ul class="list-unstyled p_list">
                                    <li><i class="ti-check"></i>{{ $package?->product_limit }}
                                        @if ($package->product_limit == 1)
                                            @__('Product')
                                        @else
                                            @__('Products')
                                        @endif
                                    </li>
                                    @if ($package?->validity)
                                        <li><i
                                                class="ti-check"></i>{{ $package?->validity . ' ' . trans($package?->unit) }}
                                        </li>
                                    @endif
                                    <li><i
                                            class="ti-check"></i>{{ $package?->limited_feature ? trans('Limited Features') : trans('All Features') }}
                                    </li>
                                </ul>
                                @if (auth()->user()?->activePlan()->first()?->order?->package_id == $package->id && auth()->user()?->type == 'subscriber')
                                    <a href="#" class="price_btn btn_hover">
                                        <i class="ti-check"></i>
                                    </a>
                                @else
                                    <a href="{{ route('order.create', ['package' => $package]) }}"
                                        class="price_btn btn_hover">@lang('welcome.subscribe')</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    <div class="col-lg-12 col-12 text-center mt_30">
                        <a href="{{ route('package.compare') }}" class="btn_hover agency_banner_btn btn-bg">
                            @__('root.compare-package')</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
