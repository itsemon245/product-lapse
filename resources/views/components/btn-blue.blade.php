@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'Blue';
    $name = $attributes->get('value');
    $route = $attributes->get('href');

@endphp

<a {{ $attributes->merge(['class' => 'button-1' , 'href' => $route, 'style' => 'background: #6c84ee' ])->merge(['id' => 'Blue']) }}>{{ $name }}</a>


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
