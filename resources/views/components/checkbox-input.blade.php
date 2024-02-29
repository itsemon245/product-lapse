@php
        $label = $attributes->get('label');

@endphp
<label class="text_c f_500 "> 
    <input type="checkbox" {{ $attributes->merge() }}>
    {{ $label }}
</label>

