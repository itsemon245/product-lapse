@php
    $name = $attributes->get('name');
    $label = $attributes->has('label') ? $attributes->get('label') : 'Select';
    $placeholder = $attributes->has('placeholder') ? $attributes->get('placeholder') : 'Select one...';
@endphp
<label class=" m-0 text_c f_500">{{ $label }}</label>
<select class="selectpickers" name="{{ $name }}" >
    <option selected disabled>{{ $placeholder }}</option>
    {{ $slot }}
</select>
@error($name)
<span class="text-danger">{{ $message }}</span>
@enderror
@push('customJs')
@endpush