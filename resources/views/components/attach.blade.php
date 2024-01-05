@php
    $name = $attributes->get('name');
    $id = $attributes->has('id') ? $attributes->get('id') : 'imageFile';
    $style = $attributes->has('style') ? $attributes->get('style') : '' ;
@endphp

<label class=" m-1 text_c f_500">Attach file</label>
<input id="{{ $id }}" style="{{ $style }}" name="{{ $name }}" type="file" class="input-file">
@error($name)
<span class="text-danger">{{ $message }}</span>
@enderror