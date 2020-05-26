<?
require_once __DIR__ . '/../config.php';
use WebServer\Classes\DataBase;

$db = new DataBase\dbconn();

if(isset($_POST['login'])) {
    $login_in = $db->login_in($_POST['login'], $_POST['password']);

    if ($login_in == 'success')
        echo 'success';
    else
        echo 'login_error';
} else {
    echo 'error';
}