@props(['value'])

<label {{ $attributes->merge(['class' => 'text_c f_500']) }}>
    {{ $value ?? $slot }}
</label>
