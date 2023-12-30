@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'primary';
    $name = $attributes->has('name') ? $attributes->get('name') : 'primary';
    $class = $attributes->has('class') ? $attributes->get('class') : 'btn_hover agency_banner_btn btn-bg btn-bg3';
    $type = $attributes->has('type') ? $attributes->get('type') : '';

@endphp
<button class="{{ $class . 'btn_hover agency_banner_btn btn-bg btn-bg3' }}" type="{{ $type }}" id="{{ $id }}" >{{ $name }}</button>

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



