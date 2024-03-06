@php
    $name = $attributes->get('name');
    $label = $attributes->has('label') ? $attributes->get('label') : '';
    $class = $attributes->has('class') ? $attributes->get('class') : '';
    $id = $attributes->has('id') ? $attributes->get('id') : 'imageFile';
    $style = $attributes->has('style') ? $attributes->get('style') : '';
@endphp

<label class=" mb-3 text_c f_500">{{ $label }}</label>
<input {{$attributes->merge()}} type="file" class="input-file"
    multiple>
@error($name)
    <span class="text-danger">{{ $message }}</span>
@enderror
