@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'primary';
    $name = $attributes->has('value') ? $attributes->get('value') : 'primary';
@endphp
<button
    {{ $attributes->merge(['class' => 'btn_hover agency_banner_btn btn-bg'])->merge(['id' => 'primary']) }}>{{ $name }}</button>

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