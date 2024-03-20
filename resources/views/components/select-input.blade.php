@php
    $name = $attributes->get('name');
    $label = $attributes->get('label');
    $placeholder = $attributes->has('placeholder') ? $attributes->get('placeholder') : 'Select one...';
@endphp
<div class="relative">
    @if ($label)
        <label class="text_c f_500">{{ $label }}</label>
    @endif
    <select {{ $attributes->merge(['class' => 'selectpickers']) }}>
        <option selected disabled>{{ $placeholder }}</option>
        {{ $slot }}
    </select>
    @if ($attributes->has('required'))
        <span title="@__('This field is required')"
            class="absolute cursor-help text-red-500 {{ $attributes->has('label') ? 'top-0' : '-top-10' }} {{ app()->getLocale() == 'en' ? 'right-2' : 'left-2' }}   font-bold">*</span>
    @endif
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
@push('customJs')
@endpush
