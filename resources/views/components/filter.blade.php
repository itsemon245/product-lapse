<form method="get" action="{{ $route }}">
    @foreach ($columns as $column)
        <input type="hidden" name="columns[]" value="{{ $column }}">
    @endforeach
    <input type="hidden" name="model" value="{{ $model }}">
    @isset($options)
        <select onchange="this.form.submit()" name="search" class="selectpickers selectpickers2">
            <option selected value="">@__('filter.all')</option>
            @forelse ($options as $opt)
                <option @selected(request()->query('search') == $opt->value->{app()->getLocale()}) value="<?= $opt->value->{app()->getLocale()} ?>">
                    <?= $opt->value->{app()->getLocale()} ?></option>
            @empty
                <option>@__('filter.no-items')</option>
            @endforelse
        </select>
    @else
        {{ $slot }}
    @endisset

</form>
