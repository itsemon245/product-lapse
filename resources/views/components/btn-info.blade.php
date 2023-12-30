@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'success';
    $name = $attributes->get('value');
    $route = $attributes->get('href');

@endphp
<a {{ $attributes->merge(['class' => 'button-1 btn-bg-2', 'href' => $route ])->merge(['id' => 'success']) }}><i class="ti-reload"></i>{{ $name }}</a>


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

