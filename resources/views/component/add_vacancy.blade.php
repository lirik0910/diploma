<div class="modal add_vacancy_modal">
    <div class="modal__content">
        <div class="modal__header">Новая вакансия</div>
        <div class="modal__body">
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

