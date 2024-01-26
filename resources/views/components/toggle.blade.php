@props(['hxInclude' => ''])

@php
    $id = $attributes->has('id') ? $attributes->get('id') : $attributes->get('name');
    $hxInclude = str($hxInclude)->contains('.') ? str($hxInclude)->replace('.', '') : '';
@endphp

<label for="{{ $id }}" class="inline-flex items-center cursor-pointer">
    @isset($left)
        <span class="me-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $left }}</span>
    @endisset
    <input type="checkbox" name="toggle" >
    <div
        class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-purple-300 dark:peer-focus:ring-purple-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary">
    </div>

    @isset($right)
        <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $right }}</span>
    @endisset
</label>
