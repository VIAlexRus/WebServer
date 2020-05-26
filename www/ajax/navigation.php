<?
require_once __DIR__ . '/../config.php';

if(isset($_REQUEST['nav'])) {
    $_SESSION['nav'] = $_REQUEST['nav']*3;
} else {
    echo 'error';
}