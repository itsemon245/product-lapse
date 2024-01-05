@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'Primary';
    $extra = $attributes->has('value') ? $attributes->get('value') : '';
    $name = $attributes->has('name') ? $attributes->get('name') : '';
    $route = $attributes->has('href') ? $attributes->get('href') : '';
    $class = $attributes->has('class') ? $attributes->get('class') : '';
    $type = $attributes->get('type');
@endphp


@if ($type == 'anchor')
<a {{ $attributes->merge([ 'class' => $class , 'href' => $route ])->merge(['id' => $id ]) }}> {!! $extra !!} {{ $name }}</a>
@else
<button {{ $attributes->merge([ 'class' => $class, 'type' => $type ])->merge(['id' => $id ]) }}> {!! $extra !!} {{ $name }}</button>
@endif


@push('customJs')
    <script>
        $(document).ready(function() {
            btn = $('#{{ $id }}')
            btn.click(e => {
                history.back()
            })
        });
    </script>
@endpush