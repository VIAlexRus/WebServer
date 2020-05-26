<div id="js-modal-edit-task"  class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-edit-task">Редактирование задачи</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="edit_task" action="" method="post">
                    <input type="hidden" name="id" value="">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 hide edit_errors errors"></div>
                            <div class="col-xl-6">
                                <label>Имя пользователя:</label>
                            </div>
                            <div class="col-xl-6">
                                <input type="text" name="name" disabled="">
                            </div>
                            <div class="col-xl-6">
                                <label>E-mail:</label>
                            </div>
                            <div class="col-xl-6">
                                <input type="email" name="email" disabled="">
                            </div>
                            <div class="col-xl-6">
                                <label>Засчитать выполнение:</label>
                            </div>
                            <div class="col-xl-6">
                                <input type="checkbox" name="performedBool">
                            </div>
                            <div class="col-xl-12">
                                <label>Текст задачи:</label>
                            </div>
                            <div class="col-xl-12">
                                <textarea cols="60" rows="10" name="text" required=""></textarea>
                            </div>
                            <div class="col-xl-12">
                                <input type="submit" name="login_in" value="Сохранить">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>