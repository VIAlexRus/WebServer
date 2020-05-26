$(function () {
    $('form[name=login]').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            data: formData,
            type: "POST",
            url: 'ajax/login_in.php',
            success: function(data){
                if (data == 'success'){
                    $(this).find('.login_errors').addClass('hide');
                    location.href='/';
                } else {
                    $(this).find('.login_errors').removeClass('hide').html('Неверный логин или пароль');
                };
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('form[name=new_task]').submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $(this).find('.task_errors').addClass('hide');
        $.ajax({
            data: formData,
            type: "POST",
            url: 'ajax/addTask.php',
            success: function(data){
                if (data == 'success'){
                    location.href='/';
                } else {
                    $(this).find('.task_errors').removeClass('hide').html('Проверьте введённые данные');
                };
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });

    $('.edit-text').on('click', function () {
        var idTask = $(this).data('id');
        var item = $('.task-item[data-task-id='+idTask+']');
        var modal = $('#js-modal-edit-task')
        modal.find('input[name=id]').val(idTask);
        modal.find('input[name=name]').val(item.find('.task-user-name p').html());
        modal.find('input[name=email]').val(item.find('.task-user-email p').html());
        modal.find('textarea[name=text]').val(item.find('.task-text p').html());
        if(item.find('.task-performed p').html()) {
            modal.find('input[name=performedBool]').prop('checked', true);
        } else {
            modal.find('input[name=performedBool]').prop('checked', false);
        }
    })

    $('form[name=edit_task]').submit(function (e) {
        e.preventDefault();
        var idTask = $(this).find('input[name=id]').val();
        var item = $('.task-item[data-task-id='+idTask+']');
        var oldText =  item.find('.task-text p').html();
        var text = $(this).find('textarea[name=text]').val();
        if ($(this).find('input[name=performedBool]').is(':checked')){
            var performedBool = 1;
        } else {
            var performedBool = 0;
        }
        $.ajax({
            url: 'ajax/performedTask.php',
            type: "POST",
            data: {id:idTask, performedBool:performedBool},
            success: function(data){
                if (data == 'success'){
                    if (performedBool == 1) {
                        if (!item.find('.task-performed p').html()) {
                            item.find('.task-performed').append('<p>Выполнено</p>');
                        }
                    } else {
                        item.find('.task-performed p').remove();
                    }
                }
            }
        });
        if(text != oldText) {
            var formData = new FormData(this);
            $.ajax({
                url: 'ajax/editTask.php',
                type: "POST",
                data: formData,
                success: function(data){
                    console.log(data);
                    if (data == 'success'){
                        item.find('.task-text p').html(text);
                        item.find('.task-performed').append('<i class="edit-admin" title="Отредактировано Администратором">&#10004;</i>');
                        $(this).find('.edit_errors').addClass('hide');
                        $('#js-modal-edit-task').modal('toggle');
                    } else {
                        if (data == 'login_pls'){
                            $('.edit_errors').removeClass('hide').html('Войдите в систему');
                        } else {
                            $('.edit_errors').removeClass('hide').html('Проверьте введённые данные');
                        }
                    };
                },
                cache: false,
                contentType: false,
                processData: false
            });
        } else {
            $('#js-modal-edit-task').modal('toggle');
        }
    })

    $('.sort-button').on('click', function (e) {
        e.preventDefault();
        var by = $(this).data('by');
        var asc = $(this).data('asc');
        $.ajax({
            url: 'ajax/sort.php',
            type: "POST",
            data: {by:by, asc:asc},
            success: function(data){
                if (data != 'error') {
                    location.href='/';
                }
            }
        });
    })

    $('.nav-button').on('click', function (e) {
        e.preventDefault();
        var nav = $(this).data('nav');
        $.ajax({
            url: 'ajax/navigation.php',
            type: "POST",
            data: {nav:nav},
            success: function(data){
                if (data != 'error') {
                    location.href='/';
                }
            }
        });
    })
})