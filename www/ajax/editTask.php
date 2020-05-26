<?
require_once __DIR__ . '/../config.php';
use WebServer\Classes\DataBase;

$db = new DataBase\dbconn();

if(isset($_REQUEST['id']) && isset($_REQUEST['text'])) {
    $results = $db->editTask(strip_tags($_REQUEST['id']), strip_tags($_REQUEST['text']));

    if ($results === 'login_pls') {
        echo 'login_pls';
    } else {
        if($results) {
            echo 'success';
        }
    }
} else {
    echo 'error';
}

