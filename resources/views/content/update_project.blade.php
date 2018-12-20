@extends('app')

@section('content')
    @php
        // var_dump($criterias); die;
    @endphp
    <main>
        <div class="container">
            <div class="row">
                <form id="update_project-form" class="form update-project">
                    @csrf
                    {{--            <div class="form-control" style="margin-bottom: 20px">--}}
                    <label id="label-duration">Введите название проекта:</label>
                    <input type="text" name="name" value="{{ $item->name }}">
                    {{--            </div>--}}

                    {{--            <div class="form-control" style="margin-bottom: 20px">--}}
                    <label id="label-duration">Введите описание проекта:</label>
                    <textarea class="form-control" type="text" name="description">
                {{ $item->description }}
            </textarea>
                    {{--            </div>--}}

                    {{--            <div class="form-control" style="margin-bottom: 20px">--}}
                    <label id="label-duration">Выберите текущий статус проекта:</label>
                    <select class="form-control" id="status" name="status">
                        @foreach($statuses as $status)
                            @if($item->status_id === $status->id)
                                <option selected value="{{ $status->id }}">{{ $status->title }}</option>
                            @else
                                <option value="{{ $status->id }}">{{ $status->title }}</option>
                            @endif
                        @endforeach
                    </select>
                    {{--            </div>--}}
                    {{--            <div class="form-control">
                                    <label id="label-duration">Выберите длительность проекта:</label>
                                    <select class="form-control" id="duration" name="duration">
                                        @foreach($criterias['duration'] as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-control">
                                    <label id="label-speed">Выберите необходимую скорость выполнения:</label>
                                    <select class="form-control" id="speed" name="speed">
                                        @foreach($criterias['speed'] as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-control">
                                    <label id="label-communicative">Выберите уровень обеспечения коммуникации менеджером:</label>
                                    <select id="communicative" name="communicative">
                                        @foreach($criterias['communicative'] as $key => $value)
                                            <option value="{{ $value }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-control">
                                    <label id="label-technologies">Выберите технологии, которые будут использоваться:</label>
                                    <select class="form-control" id="directing" name="directing">
                                        @foreach($criterias['technologies'] as $key => $value)
                                            <option value="{{ $key }}">{{ $key }}</option>
                                        @endforeach
                                    </select>
                                </div>--}}

                    {{--            <div class="form-control">--}}
                    <input class="form-control" type="submit" value="Сохранить">
                    {{--            </div>--}}
                </form>
            </div>
            <div class="row">
                <table class="vacancies__table">
                    <tr class="vacancies__table-row">
                        <th class="rating__table-header">№</th>
                        <th class="rating__table-header">Название</th>
                        <th class="rating__table-header">Статус</th>
                        <th class="rating__table-header">Исполнитель</th>
                        <th class="rating__table-header">Действия</th>
                    </tr>
                    @foreach($item->vacancies as $vacancy)
                            <tr class="vacancy__table-row">
                                <td class="rating__table-cell">{{ $vacancy->id }}</td>
                                <td class="rating__table-cell">{{ $vacancy->name }}</td>
                                <td class="rating__table-cell">@if($vacancy->status) Занята @else Свободна @endif</td>
                                <td class="rating__table-cell">@if($vacancy->status) <a href="#">{{ $vacancy->worker->name }}</a> @else — @endif</td>
                                <td class="rating__table-cell">
                                    <a class="update_vacancy" href="{{ url('/vacancies/' . $vacancy->id) }}" data-id="{{ $vacancy->id }}">Редактировать</a>
                                    <a href="{{ url('/vacancies/delete/' . $vacancy->id) }}">Удалить</a>
                                </td>
                            </tr>
                    @endforeach
                    @if(count($item->vacancies) === 0)
                        <tr class="vacancy__table-row">
                            <td>Нет вакансий</td>
                        </tr>
                    @endif
                    <tr class="vacancy__table-row">
                        <td><button class="vacancy_add">Добавить вакансию</button></td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <div class="new_vacancy_block" style="display: none">
                    <form id="add_vacancy-form" class="add_vacancy">
                        <input name="name" placeholder="Введите название">

                        @foreach($defaultCriterias as $defaultCriteria)
                            @if($defaultCriteria->id === 1)
                                <input name="{{ $defaultCriteria->title }}" placeholder="{{ $defaultCriteria->subtitle }}">
                            @elseif($defaultCriteria->id === 2)
                                <label>{{ $defaultCriteria->subtitle }}</label>
                                <select name="{{ $defaultCriteria->title }}">
                                    <option value="none">Отсутствует</option>
                                    <option value="part">Частичная</option>
                                    <option value="full">Полная</option>
                                </select>
                            @elseif($defaultCriteria->id === 3)
                                <label>{{ $defaultCriteria->subtitle }}</label>
                                <select name="{{ $defaultCriteria->title }}">
                                    <option value="short">Короткий (до 1 месяца)</option>
                                    <option value="normal">Средний (от 1 месяца до 3 месяцев)</option>
                                    <option value="long">Длительный (от 3 месяцев)</option>
                                </select>
                            @elseif($defaultCriteria->id === 4)
                                <label>{{ $defaultCriteria->subtitle }}</label>
                                <select name="{{ $defaultCriteria->title }}">
                                    <option value="hot">Высокая</option>
                                    <option value="normal">Обычная</option>
                                    <option value="easy">Минимальная</option>
                                </select>
                            @endif
                        @endforeach

                        <input type="submit" class="submit_btn approve" value="Добавить">
                        <button class="cancel">Отменить</button>
                    </form>
                </div>

            </div>
        </div>
    </main>
@endsection
