@props(['columns' => [], 'route' => '#', 'model' => ''])
<form method="get" action="{{ $route }}">
    @foreach ($columns as $column)
        <input type="hidden" name="columns[]" value="{{ $column }}">
    @endforeach
    <input type="hidden" name="model" value="{{ $model }}">
    <label
        class="inline-flex cursor-pointer items-center px-2 py-1 rounded {{ !empty(request()->query('search')) ? '!bg-primary text-white' : '!text-gray-500 bg-white border' }} mx-4">
        <input onchange="this.form.submit()" class="hidden" type="checkbox" value="{{ auth()->id() }}" name="search"
            id="" />
        <span class="mb-0">My {{ str($model)->plural()->title()->toString() }}</span>
    </label>
</form>
