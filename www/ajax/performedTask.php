<?
require_once __DIR__ . '/../config.php';
use WebServer\Classes\DataBase;

$db = new DataBase\dbconn();

if(isset($_REQUEST['id']) && isset($_REQUEST['performedBool'])) {
    $results = $db->performedTask($_REQUEST['id'], $_REQUEST['performedBool']);

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