<?php
session_start();
$DBHost = "localhost";
$DBLogin = "root";
$DBPassword = "";
$DBName = "MySite";
$dblink = mysqli_connect($DBHost, $DBLogin, $DBPassword, $DBName)
or die(mysqli_errno($dblink));
mysqli_query($dblink, "SET NAMES 'utf8'");
$_SESSION['dblink'] = $dblink;

require_once __DIR__ . '/vendor/autoload.php';
