@props(['color' => 'primary', 'hasIcon'=> false])
@php
    $colorClass = match ($color) {
        'primary' => 'agency_banner_btn2',
        'secondary' => 'btn-bg-grey',
        'dark' => 'btn-bg3',
        'success' => 'btn-bg1',
        default => ''
    };
    $type = $attributes->has('type') ? $attributes->get('type') : 'submit';
    $action = $attributes->has('action') ? $attributes->has('action') : '';
    $enctype = $attributes->has('enctype') ? $attributes->has('enctype') : 'multipart/form-data';
@endphp

@switch(strtolower($type))
    @case('submit')
        <button
            {{ $attributes->merge(['class' => $hasIcon ? 'btn' : 'btn_hover agency_banner_btn btn-bg ' . $colorClass]) }}>{!! $slot ?? 'Button' !!}</button>
    @break

    @case('button')
        <button
            {{ $attributes->merge(['class' => $hasIcon ? 'btn' : 'btn_hover agency_banner_btn btn-bg ' . $colorClass]) }}>{!! $slot ?? 'Button' !!}</button>
    @break
    @case('link')
        <a {{ $attributes->merge(['class' => $hasIcon ? 'btn' : 'btn_hover agency_banner_btn btn-bg ' . $colorClass]) }}>{!! $slot ?? 'Link' !!}</a>
    @break

    @case('delete')
        <form class="w-max h-max" action="{{$action}}" method="post" enctype="{{$enctype}}">
            @csrf
            @method('DELETE')
            <button {{ $attributes->merge(['class' => $hasIcon ? 'btn' : 'btn_hover agency_banner_btn btn-bg ' . $colorClass]) }}>
                {!! $slot ?? 'Form Submit' !!}
            </button>
        </form>
    @break

    @default
        <button
            {{ $attributes->merge(['class' => 'btn_hover agency_banner_btn btn-bg ' . $colorClass]) }}>{!! $slot ?? 'Button' !!}</button>
@endswitch
