@php
    $name = $attributes->get('name');
    $labelValue = $attributes->has('label') ? $attributes->get('label') : $name;
    $placeholder = $attributes->has('placeholder') ? $attributes->get('placeholder') : $name;
@endphp

<div class="form-group text_box col-lg-4 col-md-12">
    {!! $label ?? '<label class="text_c f_500">{{ $labelValue }}</label>' !!}
    <input type="text" placeholder="{{ $placeholder }}">
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
