@php
    $label = $attributes->get('label');
    $name = $attributes->get('name');
    $row = $attributes->get('rows');
    $col = $attributes->get('cols');
    $value = $attributes->get('value');
    $placeholder = $attributes->get('placeholder');
@endphp
<div class="form-group text_box col-lg-12 col-md-12">
    <label class=" text_c f_500">{{ $label }}</label>
    <textarea {{ $attributes->merge(['placeholder' => $placeholder, 'label' => $label, 'name' => $name ])->merge(['value' => old($name)])->merge(['rows' => $row, 'cols' => $col ]) }}>{{ $slot ? $slot : old($name) }}
    @if ($value )
    {{ $value }}
    @endif
    </textarea>
    @error($name)
    <span class="text-danger">{{ $message }}</span>
    @enderror
</div>