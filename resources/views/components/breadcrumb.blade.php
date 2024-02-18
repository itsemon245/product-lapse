@props(['list' => []])
@if (count($list) > 0)
    <section class="breadcrumb_area">
        <div class="container d-flex">
            <div class="breadcrumb_content text-center ml-auto">
                <ul class="breadcrumb">
                    @forelse ($list as $item)
                        <li class="breadcrumb-item {{ request()->routeIs('dashboard') ? 'active' : '' }} "><a
                                href="{{ productId() ? route('product.show', productId()) : rotute('dashboard') }}">@__('root.dashboard')</a>
                        </li>
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
@endif
