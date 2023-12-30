@php
    $name = $attributes->get('name');
    $id = $attributes->has('id') ? $attributes->get('id') : 'imageFile';
    $style = $attributes->get('style');
@endphp

<div class="form-group text_box col-lg-4 col-md-12">
    <label class=" text_c f_500">Attach file</label>
    <input id="{{ $id }}" style="{{ $style }}" name="{{ $name }}" type="file" class="input-file">
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>