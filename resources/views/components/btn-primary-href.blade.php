@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'Primary';
    $extra = $attributes->has('value') ? $attributes->get('value') : '';
    $name = $attributes->get('name');
    $route = $attributes->get('href');

@endphp

<a {{ $attributes->merge(['class' => 'btn_hover agency_banner_btn btn-bg' , 'href' => $route ])->merge(['id' => $id]) }}> {!! $extra !!} {{ $name }}</a>


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