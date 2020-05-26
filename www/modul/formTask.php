<div class="form_task">
    <form name="new_task" action="" method="post">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 hide task_errors errors"></div>
                <div class="col-xl-12">
                    <h3>Введите новую задачу</h3>
                </div>
                <div class="col-xl-2">
                    <label>Имя пользователя:</label>
                </div>
                <div class="col-xl-10">
                    <input placeholder="Имя пользователя" type="text" name="user" required="" <?=isset($_SESSION['login']) ? "value=".$_SESSION['login'] : ''?>>
                </div>
                <div class="col-xl-2">
                    <label>E-mail:</label>
                </div>
                <div class="col-xl-10">
                    <input placeholder="E-mail" type="email" name="email" required="">
                </div>
                <div class="col-xl-2">
                    <label>Текст задачи:</label>
                </div>
                <div class="col-xl-10">
                    <textarea placeholder="Текст задачи" name="message" cols="30" rows="5" required=""></textarea>
                </div>
                <?if(isset($_SESSION['addTask']) && $_SESSION['addTask']=='true'):
                    unset($_SESSION['addTask']);?>
                    <div class="col-xl-12 add-ok"><p>Задача добавлена успешно</p></div>
                <?endif;?>
                <div class="col-xl-12">
                    <input type="submit" name="send" value="Отправить">
                </div>
            </div>
        </div>
    </form>
</div>