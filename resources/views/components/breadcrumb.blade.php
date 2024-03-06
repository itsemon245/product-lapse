@props(['list' => []])
@php
    $class = $attributes->has('class') ? $attributes->get('class') : 'breadcrumb_area';
@endphp
<section class="{{ $class }}">
    <div class="container d-flex">
        <div class="breadcrumb_content text-center ml-auto">
            <ul class="breadcrumb">
                @if (str(url()->current())->contains('dashboard'))
                    <li class="breadcrumb-item {{ request()->routeIs('dashboard') ? 'active' : '' }} ">
                        <a href="{{ route('dashboard') }}">@__('root.dashboard')</a>
                    </li>
                @elseif (str(url()->current())->contains('admin'))
                    <li class="breadcrumb-item {{ request()->routeIs('admin') ? 'active' : '' }} ">
                        <a href="{{ route('admin') }}">@__('Admin')</a>
                    </li>
                @else
                    <li class="breadcrumb-item {{ request()->routeIs('home') ? 'active' : '' }} ">
                        <a href="{{ route('home') }}">@__('Home')</a>
                    </li>
                @endif
                @if (productId() != null && str(url()->current())->contains('dashboard') && !str(url()->current())->contains(['certificate', 'select']))
                    <li
                        class="breadcrumb-item {{ request()->routeIs('product.show', productId()) ? 'active' : '' }} ">
                        <a href="{{ request()->routeIs('product.index') ? '#' : route('product.show', productId()) }}">
                        {{request()->routeIs('product.index') ? __('Products') : __('Product')}}
                        </a>
                    </li>
                @endif
                @forelse ($list as $item)
                    @if ($loop->last)
                        <li class="breadcrumb-item active">{{ $item['label'] }}</li>
                    @else
                        <li class="breadcrumb-item"><a href="{{ $item['route'] }}">{{ $item['label'] }}</a></li>
                    @endif
                @empty
                @endforelse
            </ul>
        </div>
    </div>
</section>
