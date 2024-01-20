@php
    $name = $attributes->get('name');
@endphp

<div>
    @if ($attributes->has('label'))
        <label for="{{ $attributes->get('id') }}" class="text_c f_500">{{ $attributes->get('label') }}</label>
    @endif
    <input {{ $attributes->merge(['class' => 'block w-full']) }} />
    @error($name)
        <div class="text-danger">{{ $message }}</div>
    @enderror

</div>
