<?
require_once __DIR__ . '/../config.php';

if(isset($_REQUEST['by']) && isset($_REQUEST['asc'])) {
    $_SESSION['sort']['by'] = $_REQUEST['by'];
    $_SESSION['sort']['asc'] = $_REQUEST['asc'];
} else {
    echo 'error';
}