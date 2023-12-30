@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'success';
    $name = $attributes->get('value');
    $route = $attributes->get('href');

@endphp
<a {{ $attributes->merge(['class' => 'button-1 btn-bg-1', 'href' => $route ])->merge(['id' => 'success']) }}>{{ $name }}</a>


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