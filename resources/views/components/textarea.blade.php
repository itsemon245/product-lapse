@php
    $label = $attributes->get('label');
    $name = $attributes->get('name');
@endphp
<div class="form-group text-box">
    @if ($label)
        <label class="text_c f_500">{{ $label }}</label>
    @endif
    <textarea {{ $attributes->merge(['class' => 'form-control message !leading-[normal]']) }}>{{ empty($slot) ? old($name) : $slot }}</textarea>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
