jQuery(document).ready(function(){
    var _i = {
        'addProjectForm': $('#add_project-form'),
        'updateProjectForm': $('#update_project-form'),
        'addVacancy': $('.vacancy_add'),
        'addVacancyForm': $('#add_vacancy-form'),
    };

    /* Vacancies */
    _i.addVacancy.on('click', function () {
        $('.new_vacancy_block').fadeIn();
    });

    $('.new_vacancy_block').find('.cancel').on('click', function (e) {
        e.preventDefault();

        $('.new_vacancy_block').fadeOut();
    });

    _i.addVacancyForm.on('submit', function (e) {
        e.preventDefault();

        let data = {
            criterias: {}
        };
        let inputs = $(this).find('input');
        
        inputs.each(function () {
            if($(this).attr('name') === 'technologies'){
                data['criterias'][$(this).attr('name')] = $(this).val();
            } else{
                data[$(this).attr('name')] = $(this).val();
            }

        });

        let selects = $(this).find('select');

        selects.each(function () {
            data['criterias'][$(this).attr('name')] = $(this).val();
        });

        //console.log(location.href.split('/'));
        data.project_id = location.href.split('/')[4];

        $.ajax({
            url: '/vacancies/add',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            dataType: 'json',
            data: data
        }).done( (data) => {
            location.reload();
        }).fail(function (e) {
            console.log('Error!');
            /*            $('.modal__header').text('Ошибка');
                        $('.modal__body').text('Вы ввели неправильный логин или пароль');
                        $('.modal').fadeIn('400', function() {
                            $('.modal__content').slideDown();
                        });*/
        });
    });

    /* end Vacancies */

    /*Projects */
    _i.addProjectForm.on('submit', function (e) {
        e.preventDefault();

        let data = {};
        let inputs = $(this).find('input');

        inputs.each(function () {
            if($(this).attr('name') === 'name'){
                data.name = $(this).val();
            }
        });

        let textarea = $(this).find('textarea');

        textarea.each(function () {
            if($(this).attr('name') === 'description'){
                data.description = $(this).val();
            }
        });

        let selects = $(this).find('select');

        selects.each(function () {
            if($(this).attr('name') === 'status'){
                data.status_id = $(this).val();
            }
        });

        $.ajax({
            url: '/projects/add',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            dataType: 'json',
            data: data
        }).done( (data) => {
            location.href = '/';
        }).fail(function (e) {
            console.log('Error!');
/*            $('.modal__header').text('Ошибка');
            $('.modal__body').text('Вы ввели неправильный логин или пароль');
            $('.modal').fadeIn('400', function() {
                $('.modal__content').slideDown();
            });*/
        });
    });

    _i.updateProjectForm.on('submit', function (e) {
        e.preventDefault();

        let data = {};
        let inputs = $(this).find('input');

        inputs.each(function () {
            if($(this).attr('name') === 'name'){
                data.name = $(this).val();
            }
        });

        let textarea = $(this).find('textarea');

        textarea.each(function () {
            if($(this).attr('name') === 'description'){
                data.description = $(this).val();
            }
        });

        let selects = $(this).find('select');

        selects.each(function () {
            if($(this).attr('name') === 'status'){
                data.status_id = $(this).val();
            }
        });

        //console.log(location.href);
        let id = location.href.split('/')[2];

        $.ajax({
            url: '/projects/' . id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            dataType: 'json',
            data: data
        }).done( (data) => {
            console.log('success!!');
        }).fail(function (e) {
            console.log('Error!');
            /*            $('.modal__header').text('Ошибка');
                        $('.modal__body').text('Вы ввели неправильный логин или пароль');
                        $('.modal').fadeIn('400', function() {
                            $('.modal__content').slideDown();
                        });*/
        });
    });


    $('.change-worker').on('click', function (e) {
        e.preventDefault();

        let id = location.href.split('/')[4];

        $.ajax({
            url: '/workers/choose',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            dataType: 'html',
            data: {id: id}
        }).done( (data) => {
            if($('.table-block').find('.candidates__table')){
                $('.table-block').find('.candidates__table').remove();
            }
            $('.table-block').append(data);
            $('.table-block').fadeIn(data);


            console.log('success!!');
        }).fail(function (e) {
            console.log('Error!');
            /*            $('.modal__header').text('Ошибка');
                        $('.modal__body').text('Вы ввели неправильный логин или парол   ь');
                        $('.modal').fadeIn('400', function() {
                            $('.modal__content').slideDown();
                        });*/
        });

    });
    
    $('.choose-worker').on('click', function (e) {
        e.preventDefault();

        let id = $(this).data('id');
console.log(id);
        $('.worker_id_input').val(id);
        console.log($('.worker_id_input').val());
        //$(this).
    });

    $('#update_vacancy-form').on('submit', function (e) {
        e.preventDefault();


        let data = {
            criterias: {}
        };
        let inputs = $(this).find('input');

        inputs.each(function () {
            if($(this).attr('name') === 'technologies'){
                data['criterias'][$(this).attr('name')] = $(this).val();
            } else{
                data[$(this).attr('name')] = $(this).val();
            }

        });

        let selects = $(this).find('select');

        selects.each(function () {
            data['criterias'][$(this).attr('name')] = $(this).val();
        });
console.log(data);
        //console.log(location.href.split('/'));
        let id = location.href.split('/')[4];


        $.ajax({
            url: '/vacancies/' . id,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            dataType: 'json',
            data: data
        }).done( (data) => {
            location.reload();
        }).fail(function (e) {
            console.log('Error!');
            /*            $('.modal__header').text('Ошибка');
                        $('.modal__body').text('Вы ввели неправильный логин или пароль');
                        $('.modal').fadeIn('400', function() {
                            $('.modal__content').slideDown();
                        });*/
        });
    })

});




