<div id="js-modal-login"  class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-login">Авторизация</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form name="login" action="" method="post">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12 hide login_errors errors"></div>
                            <div class="col-xl-6">
                                <label>Имя пользователя:</label>
                            </div>
                            <div class="col-xl-6">
                                <input type="text" name="login" required="">
                            </div>
                            <div class="col-xl-6">
                                <label>Пароль:</label>
                            </div>
                            <div class="col-xl-6">
                                <input type="password" name="password" required="">
                            </div>
                            <div class="col-xl-6">
                                <input type="submit" name="login_in" value="Отправить">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>