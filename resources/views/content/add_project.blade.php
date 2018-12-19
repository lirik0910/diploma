@extends('app')

@section('content')
    @php
       // var_dump($criterias); die;
    @endphp
    <div class="container">
        <form class="form add-project">
            @csrf
            <div class="form-control">
                <input class="form-control" type="text" name="name" placeholder="Введите название проекта">
            </div>

            <div class="form-control">
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
            </div>

            <div class="form-control technologies-selects">

            </div>

            <div class="form-control">
                <input class="form-control" type="submit" value="Добавить">
            </div>
        </form>
    </div>
@endsection
