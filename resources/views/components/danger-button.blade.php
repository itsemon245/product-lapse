@php
    $id = $attributes->has('id') ? $attributes->get('id') : 'primary';
    $name = $attributes->has('name') ? $attributes->get('name') : 'primary';
    $class = $attributes->has('class') ? $attributes->get('class') : '';
    $type = $attributes->has('type') ? $attributes->get('type') : '';
@endphp
<button class="{{ $class . 'inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150' }}" type="{{ $type }}" id="{{ $id }}" >{{ $name }}</button>

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
