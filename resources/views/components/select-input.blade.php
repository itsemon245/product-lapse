@php
    $name = $attributes->get('name');
    $id = $attributes->get('id');
    $label = $attributes->get('label');
    $placeholder = $attributes->get('placeholder');
@endphp
<div class="form-group text_box col-lg-6 col-md-6">
    <label for="{{ $id }}" class=" text_c f_500">{{ $label }}</label>
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