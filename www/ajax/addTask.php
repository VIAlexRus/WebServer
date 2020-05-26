<?
require_once __DIR__ . '/../config.php';
use WebServer\Classes\DataBase;

$db = new DataBase\dbconn();
$error = [];
if(isset($_POST['user']) && isset($_POST['email']) && isset($_POST['message'])) {
    $results = $db->addTask(strip_tags($_POST['user']), strip_tags($_POST['email']), strip_tags($_POST['message']));

    if ($results) {
        $_SESSION['addTask'] = 'true';
        echo 'success';
    }
    else
        echo 'error';
} else {
    echo 'error';
}