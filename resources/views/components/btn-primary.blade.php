@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'primary';
    $name = $attributes->has('name') ? $attributes->get('name') : 'primary';
    $class = $attributes->has('class') ? $attributes->get('class') : 'btn_hover agency_banner_btn btn-bg';
    $type = $attributes->has('type') ? $attributes->get('type') : '';
    $target = $name == 'Delete' ? $attributes->get('data-target') : '';
    $toggle = $name == 'Delete' ? $attributes->get('data-toggle') : '';

@endphp
<button data-target="{{ $target }}" data-toggle="{{ $toggle }}" class="{{ $class . 'btn_hover agency_banner_btn btn-bg' }}" type="{{ $type }}" id="{{ $id }}" >{{ $name }}</button>

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