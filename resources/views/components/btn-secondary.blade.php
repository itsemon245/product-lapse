@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'secondary';
    $name = $attributes->has('value') ? $attributes->get('value') : 'secondary';
@endphp
<button
    {{ $attributes->merge(['class' => 'btn_hover agency_banner_btn btn-bg btn-bg3'])->merge(['id' => 'secondary']) }}>{{ $name }}</button>

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