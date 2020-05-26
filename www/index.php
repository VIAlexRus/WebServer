<?php
require_once ('config.php');

if(isset($_GET['login'])) {
    unset($_SESSION['login']);
    unset($_SESSION['sort']);
    unset($_SESSION['nav']);
}?>


<!DOCTYPE html>
<html>
    <head>
        <title>Простенький список</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/include/style.css">
        <link rel="stylesheet" href="/vendor/twbs/bootstrap/dist/css/bootstrap.css">
        <script src="/vendor/components/jquery/jquery.js"></script>
        <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.js" async=""></script>
        <script src="/include/scripts.js" async=""></script>
    </head>
    <body>
        <header>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <?if(isset($_SESSION["login"])):?>
                            <a href="?login=out">Выйти</a>
                        <?else:?>
                            <a href="#js-modal-login" data-toggle="modal" data-target="#js-modal-login">Авторизация</a>
                        <?endif;?>
                    </div>
                </div>
            </div>
        </header>

        <?require ('modul/formTask.php');?>

        <?require ('modul/getList.php');?>

        <?require ('modul/modal/login.php');?>

    </body>
</html>