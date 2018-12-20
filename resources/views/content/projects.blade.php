@extends('app')

@section('content')
<main>
    <div class="container">
        <div class="row">
            <a href="{{ url('/projects/add') }}">Добавить проект</a>
        </div>
        <div class="row">
            <table class="projects__table">
                <tr class="projects__table-row">
                    <th class="rating__table-header">№</th>
                    <th class="rating__table-header">Название</th>
                    <th class="rating__table-header">Описание</th>
                    <th class="rating__table-header">Статус</th>
                    <th class="rating__table-header">Действия</th>
                </tr>
                @foreach($items as $item)
                    <tr class="rating__table-row">
                        <td class="rating__table-cell">{{ $item->id }}</td>
                        <td class="rating__table-cell">{{ $item->name }}</td>
                        <td class="rating__table-cell">{{ $item->description }}</td>
                        <td class="rating__table-cell">{{ $item->status->title }}</td>
                        <td class="rating__table-cell">
                            <a href="{{ url('/projects/' . $item->id) }}">Редактировать</a>
                            <a href="{{ url('/projects/delete/' . $item->id) }}">Удалить</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</main>
@endsection
