@foreach ($model->selects as $select)
    <li style="color: {{ $select->color }}">{{ $select->value->{app()->getLocale()} }}</li>
@endforeach
