jQuery(document).ready(function(){
    var _i = {
        'addProjectForm': $('form')
    };

    _i.addProjectForm.on('submit', function (e) {
        e.preventDefault();
        console.log('submit!');
    });
});




