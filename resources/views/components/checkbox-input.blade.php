@props(['disabled' => false])
@php
        $label = $attributes->get('label');
        $name = $attributes->get('name');
        $checked = $attributes->has('checked') ? $attributes->get('checked') : '';

@endphp
<label class="  text_c f_500 "> 
    <input name="{{ $name }}" {{ $checked }} type="checkbox" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm']) !!}>
    {{ $label }}
</label>

