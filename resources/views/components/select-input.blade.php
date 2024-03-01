@php
    $name = $attributes->get('name');
    $label = $attributes->get('label');
    // $placeholder = $attributes->has('placeholder') ? $attributes->get('placeholder') : 'Select one...';
@endphp
<div class="relative">
    @if ($label)
        <label class="text_c f_500">{{ $label }}</label>
    @endif
    <select {{ $attributes->merge(['class' => 'selectpickers']) }}>
        <option selected disabled>{{ __('Choose one...') }}</option>
        {{ $slot }}
    </select>
    @if ($attributes->has('required'))
        <span title="@__('This field is required')"
            class="absolute cursor-help text-red-500 {{ $attributes->has('label') ? 'top-0' : '-top-10' }} right-2 font-bold">*</span>
    @endif
    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
@push('customJs')
@endpush
