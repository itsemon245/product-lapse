@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'primary';
    $name = $attributes->has('name') ? $attributes->get('name') : 'primary';
    $class = $attributes->has('class') ? $attributes->get('class') : 'btn_hover agency_banner_btn btn-bg';
    $type = $attributes->has('type') ? $attributes->get('type') : '';
    if(strtolower($name) == 'delete'){
        $toggle = $attributes->get('data-toggle') && $attributes->get('data-target');
        dd($toggle);
    }
@endphp
<button data-toggle="modal" data-target="#myModal2" class="{{ $class . 'btn_hover agency_banner_btn btn-bg' }}" type="{{ $type }}" id="{{ $id }}" >{{ $name }}</button>

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