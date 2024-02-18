@props(['list' => []])
<section class="breadcrumb_area">
    <div class="container d-flex">
        <div class="breadcrumb_content text-center ml-auto">
            <ul class="breadcrumb">
                <li class="breadcrumb-item {{ request()->routeIs('dashboard') ? 'active' : '' }} "><a
                        href="{{ route('dashboard') }}">@__('root.dashboard')</a>
                </li>
                @if (productId() != null && str(url()->current())->contains('dashboard'))
                    <li
                        class="breadcrumb-item {{ request()->routeIs('product.show', productId()) ? 'active' : '' }} ">
                        <a href="{{ route('product.show', productId()) }}">
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
