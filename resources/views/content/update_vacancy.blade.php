@extends('app')

@section('content')
    <main>
        <div class="container">
            <div class="row">
                <form id="update_vacancy-form" class="update_vacancy">
                    <label>Название вакансии</label>
                    <input name="name" placeholder="Введите название" value="{{ $item->name }}">

                    <label>Статус</label>
                    <span>@if(!$item->status) Свободная @else Занятая @endif</span>

                    @foreach($defaultCriterias as $defaultCriteria)
                        @if($defaultCriteria->id === 1)
                            <input name="{{ $defaultCriteria->title }}" placeholder="{{ $defaultCriteria->subtitle }}" value="{{ $item->criterias->where('title', 'technologies')->first()->pivot->value }}">
                        @elseif($defaultCriteria->id === 2)
                            @php
                                $val = $item->criterias->where('title', 'communicative')->first()->pivot->value;
                            @endphp
                            <label>{{ $defaultCriteria->subtitle }}</label>
                            <select name="{{ $defaultCriteria->title }}">
                                <option @if($val === 'none') selected @endif value="none">Отсутствует</option>
                                <option @if($val === 'part') selected @endif value="part">Частичная</option>
                                <option @if($val === 'full') selected @endif value="full">Полная</option>
                            </select>
                        @elseif($defaultCriteria->id === 3)
                            @php
                                $val = $item->criterias->where('title', 'period')->first()->pivot->value;
                            @endphp
                            <label>{{ $defaultCriteria->subtitle }}</label>
                            <select name="{{ $defaultCriteria->title }}">
                                <option @if($val === 'short') selected @endif value="short">Короткий (до 1 месяца)</option>
                                <option @if($val === 'normal') selected @endif value="normal">Средний (от 1 месяца до 3 месяцев)</option>
                                <option @if($val === 'long') selected @endif value="long">Длительный (от 3 месяцев)</option>
                            </select>
                        @elseif($defaultCriteria->id === 4)
                            @php
                                $val = $item->criterias->where('title', 'terms')->first()->pivot->value;
                            @endphp
                            <label>{{ $defaultCriteria->subtitle }}</label>
                            <select name="{{ $defaultCriteria->title }}">
                                <option @if($val === 'hot') selected @endif value="hot">Высокая</option>
                                <option @if($val === 'normal') selected @endif value="normal">Обычная</option>
                                <option @if($val === 'easy') selected @endif value="easy">Минимальная</option>
                            </select>
                        @endif
                    @endforeach

                    <div class="vacancy-worker">
                        <label>Исполнитель</label>
                        <input hidden name="value" value="@if($item->worker_id) {{ $item->worker_id }} @endif" />
                        <input disabled value="@if($item->worker_id) {{ $item->worker->name }} @endif" />

                        <button class="change-worker">Сменить исполнителя</button>
                        <button class="delete-worker">Убрать исполнителя</button>
                    </div>

                    <input type="submit" class="submit_btn approve" value="Сохранить">
                    <a href="{{ url('/projects/' . $item->project_id) }}" class="cancel">Отменить</a>
                </form>
            </div>
            <div class="row">
                <div class="table-block" style="display: none">

                </div>
            </div>
        </div>
    </main>
@endsection
