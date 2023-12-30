@php
    $name = $attributes->get('name');
    $label = $attributes->has('label') ? $attributes->get('label') : $name;
    $placeholder = $attributes->has('placeholder') ? $attributes->get('placeholder') : $name;
@endphp

<div class="form-group text_box col-lg-4 col-md-12">
    <label class="text_c f_500">Bank account ID</label>
    <input type="text" placeholder="996587432156">
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
