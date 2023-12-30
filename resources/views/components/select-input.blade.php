@php
    $name = $attributes->get('name');
    $label = $attributes->has('label') ? $attributes->get('label') : 'Select';
    $placeholder = $attributes->has('placeholder') ? $attributes->get('placeholder') : 'Select one...';
@endphp
<div class="form-group text_box col-lg-6 col-md-6">
    <label class=" text_c f_500">{{ $label }}</label>
    <select class="selectpickers">
        <option selected disabled>{{ $placeholder }}</option>
        {{ $slot }}
    </select>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
@push('customJs')
@endpush