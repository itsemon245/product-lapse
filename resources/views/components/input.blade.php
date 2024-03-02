@php
    $name = $attributes->get('name');
    $id = $attributes->get('id');
    // dd($name);
@endphp

<div class="form-group text_box relative">
    @if ($attributes->has('label'))
        <label for="{{ $attributes->get('id') }}" class="text_c f_500">{{ $attributes->get('label') }}</label>
    @endif
    <input {{ $attributes->class(['block w-full'])->merge(['value' => old($name)]) }} />
    @if ($attributes->has('required'))
        <span title="@__('This field is required')"
            class="absolute cursor-help text-red-500 {{ $attributes->has('label') ? 'top-0' : '-top-10' }} right-2 font-bold">*</span>
    @endif
    @error($name)
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
