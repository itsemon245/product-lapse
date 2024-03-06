@php
    $label = $attributes->get('label');
    $name = $attributes->get('name');
@endphp
<div class="form-group text-box relative">
    @if ($label)
        <label class="text_c f_500">{{ $label }}</label>
    @endif
    <textarea {{ $attributes->merge(['class' => 'form-control message !leading-[normal]']) }}>{{ $slot->isNotEmpty() ? $slot :  old($name) }}</textarea>
    <span title="@__('This field is required')"
    class="absolute cursor-help text-red-500 {{ $attributes->has('label') ? 'top-0' : '-top-10' }} {{ app()->getLocale() == 'en' ? 'right-2' : 'left-2' }}   font-bold">*</span>
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
