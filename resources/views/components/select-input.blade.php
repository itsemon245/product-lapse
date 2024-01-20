@php
    $name = $attributes->get('name');
    $label = $attributes->get('label');
    $placeholder = $attributes->has('placeholder') ? $attributes->get('placeholder') : 'Select one...';
@endphp
@if($label)
    <label class="text_c f_500">{{ $label }}</label>
@endif
<select {{ $attributes->merge(['class' => 'selectpickers']) }}>
    <option selected disabled>{{ $placeholder }}</option>
    {{ $slot }}
</select>
@error($name)
    <span class="text-danger">{{ $message }}</span>
@enderror
@push('customJs')
@endpush
