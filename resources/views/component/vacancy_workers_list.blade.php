<table class="candidates__table">
    <tr class="candidates__table-row">
        <th class="rating__table-header">№</th>
        <th class="rating__table-header">Имя</th>
        <th class="rating__table-header">Технологии</th>
        <th class="rating__table-header">Коммуникация</th>
        <th class="rating__table-header">Желаемая длительность</th>
        <th class="rating__table-header">Скорость выполнения</th>
        <th class="rating__table-header">Итоговый балл</th>
    </tr>
    @foreach($workers as $worker)
        <tr class="candidates__table-row">
            <td class="rating__table-cell">{{ $worker->id }}</td>
            <td class="rating__table-cell">{{ $worker->name }}</td>
            <td class="rating__table-cell">{{ $worker->characteristics->where('title', 'technologies')->first()->pivot->value }}</td>
            <td class="rating__table-cell">{{ $worker->characteristics->where('title', 'communicative')->first()->pivot->value }}</td>
            <td class="rating__table-cell">{{ $worker->characteristics->where('title', 'period')->first()->pivot->value }}</td>
            <td class="rating__table-cell">{{ $worker->characteristics->where('title', 'terms')->first()->pivot->value }}</td>
            <td class="rating__table-cell">{{ $worker->overall }}</td>
            <td class="rating__table-cell">
                <button class="choose-worker" data-id="{{ $worker->id }}">Выбрать</button>
            </td>
        </tr>
    @endforeach
</table>

