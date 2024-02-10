@php
    $name = $attributes->get('name');
    $label = $attributes->has('label') ? $attributes->get('label') : '';
    $id = $attributes->has('id') ? $attributes->get('id') : 'imageFile';
    $style = $attributes->has('style') ? $attributes->get('style') : '' ;
@endphp

<label class=" mb-3 text_c f_500">{{ $label }}</label>
<input id="{{ $id }}" style="{{ $style }}" name="{{ $name }}" type="file" class="input-file">
@error($name)
<span class="text-danger">{{ $message }}</span>
@enderror