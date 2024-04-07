@php
    $name = $attributes->get('name');
    $label = $attributes->has('label') ? $attributes->get('label') : '';
    $class = $attributes->has('class') ? $attributes->get('class') : '';
    $id = $attributes->has('id') ? $attributes->get('id') : 'imageFile';
    $style = $attributes->has('style') ? $attributes->get('style') : '';
@endphp

<div class="relative">
    <label class=" mb-3 text_c f_500">{{ $label }}
    </label>
    @if ($attributes->has('required'))
        <span title="@__('This field is required')"
            class="absolute cursor-help text-red-500 {{ $attributes->has('label') ? 'top-0' : '-top-10' }} {{ app()->getLocale() == 'en' ? 'right-2' : 'left-2' }}   font-bold">*</span>
    @endif
    <input {{ $attributes->merge() }} type="file" class="input-file" multiple>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
